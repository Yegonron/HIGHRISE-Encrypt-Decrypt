
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIGHRISE Encrypt & Decrypt</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
       h1{
            text-align:center;
            display: block;
            font-weight: bold;
            color:white;
            padding:5px;
        }
        h3{
            text-align:center;
            display: block;
            padding-top:5px;
        }
        .container{
            padding-left:300px;
            padding-bottom:25px;

        }
    </style>
</head>
<body class="bg-info">
<h1>HIGHRISE Encrypt & Decrypt</h1>

<h3> Securely send a decrypted message</h3>
<div class="container">
        <div class="row">
            <div class="col-md-8 offsett-md-2 bg-light p-4 mt-5 rounded">
                <form action="encrypt.php" method="POST">
                    <div class="form-group">
                        <label for="receiver" class="form-label">Receiver:</label>
                        <input type="number" class="form-control" placeholder="Enter receivers' phone number" required name="receiver" id="receiver">
                    </div> 
                    <div class="form-group">
                        <label for="mail" class="form-label">Email:</label>
                        <input type="text" class="form-control" placeholder="Enter receivers email" required name="mail" id="mail">
                    </div> 
                    <div class="form-group">
                        <label for="message" class="form-label">message:</label>
                        <textarea rows="5" class="form-control" placeholder="Enter message" required name="message" id="message"></textarea>
                    </div> 
                    <div>
                    <button type= "submit" name="send" class="btn btn-primary"> Send </button>
                    <button type= "submit" name="reset" class="btn btn-danger"> Reset </button>
                    </div>
                </form>
           </div>
        </div>
    </div>

    <h3> Securely decrypt a message</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offsett-md-2 bg-light p-4 mt-5 rounded">
                <form action="decrypt.php" method="POST">
                    <div class="form-group">
                        <label for="message">Encrypted Message:</label>
                        <textarea name="text" class="form-control" id="msg" cols="150" rows="5" 
                                    placeholder="Enter encrypted message here"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="secret_key" class="form-label">Key:</label>
                        <input type="text" class="form-control" placeholder="Enter key" required name="secret_key" id="secret_key">
                    </div> 
                    <button type= "submit" name="decrypt" class="btn btn-primary"> Decrypt </button>
                    <button type= "submit" name="reset" class="btn btn-danger"> Reset </button>
                </form>
           </div>
        </div>
    </div>
</body>

</html>