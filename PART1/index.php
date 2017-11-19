<?php
    include 'ChangeString.php';
    include 'ClearPar.php';
    include 'CompleteRange.php';

    $messageChange = "";
    $messageClear = "";
    $messageComplete = "";

    //--
    if (isset($_POST['btnChangeString'])) {
        $text = trim($_POST['txtChangeString']);
        $messageChange = "No se envio información.";
        
        if (!empty($text)) {
            $changeString = new ChangeString();
            $messageChange = "<p>" . $text . "    =>   ";
            $messageChange .= $changeString->proccess($text) . "</p>";
        }        
    }
    //--
    if (isset($_POST['btnClearPar'])) {
        echo "CLEAR:: " . $text = trim($_POST['txtClearPar']);

        $clearPar = new ClearPar();
    }
    //--
    if (isset($_POST['btnCompleteRange'])) {
        echo "COMPLETE:: " . $text = trim($_POST['txtCompleteRange']);

        $completeRange = new CompleteRange();
    }

?>
<!DOCTYPE html>
<html lang="es-ES" class="no-js">
    <head>
        <title>Exam Part 1</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1><a href=".">Exam Part 1</a></h1>
            </div>  
            <div class="row">
                <div class="col-md-12">   
                    <form method="POST" action="" class="form-inline">
                        <fieldset>
                            <legend>Change String</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="text" class="form-control" id="txtChangeString" name="txtChangeString" placeholder="Text" maxlength="25" required>
                                    <div class="input-group-addon"></div>
                                </div>
                            </div>
                            <button type="submit" name="btnChangeString" class="btn btn-primary">Procesar</button>
                        </fieldset>
                    </form>
                    <blockquote>
                        <?php echo $messageChange ?>
                    </blockquote>
                </div>     
                <div class="col-md-12">   
                    <form method="POST" action="" class="form-inline">
                        <fieldset>
                            <legend>Clear Par</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="text" class="form-control" id="txtClearPar" name="txtClearPar" placeholder="Text" maxlength="25" required>
                                    <div class="input-group-addon"></div>
                                </div>
                            </div>
                            <button type="submit" name="btnClearPar" class="btn btn-primary">Procesar</button>
                        </fieldset>
                    </form>
                    <div>
                        <?php echo $messageClear ?>
                    </div>
                </div>
                <div class="col-md-12">   
                    <form method="POST" action="" class="form-inline">
                        <fieldset>
                            <legend>Complete Range</legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"></div>
                                    <input type="text" class="form-control" id="txtCompleteRange" name="txtCompleteRange" placeholder="Text" maxlength="25" required>
                                    <div class="input-group-addon"></div>
                                </div>
                            </div>
                            <button type="submit" name="btnCompleteRange" class="btn btn-primary">Procesar</button>
                        </fieldset>
                    </form>
                    <div>
                        <?php echo $messageComplete ?>
                    </div>
                </div>  
            </div> 
            
        </div>
    </body>
</html>