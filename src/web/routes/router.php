<?php
require __DIR__ . "'\\..\\vendor\\autoload.php";

function view ($viewName, $model) 
{
    viewWithMessages ($viewName, $model, null);
}

function viewWithMessages ($viewName, $model, $messages) {
    $viewModel = $model;
    $viewMessages = $messages;    

    require_once (__DIR__ . "\\..\\views\\$viewName-page-properties.php");

    if (isset ($pageLayout)) {
        require_once (__DIR__ . "\\..\\layouts\\$pageLayout.php");
    }
    else require_once (__DIR__ . "\\..\\views\\$viewName.php");
}

function isPost () : bool { return $_SERVER ["REQUEST_METHOD"] === "POST"; }
function isGet () : bool { return $_SERVER ["REQUEST_METHOD"] === "GET"; }

function route ($controllerName, $action) {
    if ($controllerName === "makes") {        
        $controller = new Controllers\MakeController ();

        if ($action === "index") {
            $controller->getAllMakes ();
        }
        else if ($action === "edit") {
            if (isPost ()) {
                $vm = new ViewModels\MakeEditViewModel ();                
                $vm->loadFromFormData();

                $controller->saveMake ($vm);
            }
            else if (isGet()) {
                $makeId = filter_input (INPUT_GET, "id", FILTER_VALIDATE_INT);

                if ($makeId === false) throw new Error ("Invalid make.");
                $controller->getMake ($makeId);
            }
        }
    }
    else if ($controllerName === "models") {
        $controller = new Controllers\ModelController ();

        if ($action === "index") {
            $controller->getAllModels ();
        }
        else if ($action === "edit") {
            if (isPost ()) {
                $vm = new ViewModels\ModelEditViewModel ();                
                $vm->loadFromFormData();

                $controller->saveModel ($vm);
            }
            else if (isGet()) {
                $modelId = filter_input (INPUT_GET, "id", FILTER_VALIDATE_INT);

                if ($modelId === false) throw new Error ("Invalid model.");
                $controller->getModel ($modelId);
            }
        }
    }
    else if ($controllerName === "engines") {
        $controller = new Controllers\EngineController ();

        if ($action === "index") {
            $controller->getAllEngines ();
        }
        else if ($action === "edit") {
            if (isPost ()) {
                $vm = new ViewModels\EngineEditViewModel ();                
                $vm->loadFromFormData();

                $controller->saveEngine ($vm);
            }
            else if (isGet()) {
                $engineCode = filter_input (INPUT_GET, "code", FILTER_SANITIZE_STRING);

                if ($engineCode === false) throw new Error ("Invalid engine.");

                $controller->getEngineByCode ($engineCode);
            }
        }
    }
    else if ($controllerName === "drive-trains") {
        $controller = new Controllers\DriveTrainController ();

        if ($action === "index") {
            $controller->getAllDriveTrains ();
        }
        else if ($action === "edit") {
            if (isPost ()) {
                $vm = new ViewModels\DriveTrainEditViewModel ();                
                $vm->loadFromFormData();

                $controller->saveDriveTrain ($vm);
            }
            else if (isGet()) {
                $driveTrainCode = filter_input (INPUT_GET, "code", FILTER_SANITIZE_STRING);

                if ($driveTrainCode === false) throw new Error ("Invalid drive train.");

                $controller->getDriveTrainByCode ($driveTrainCode);
            }
        }
    }
   
    else throw new Error ("route $controllerName => $action not found");
}
?>