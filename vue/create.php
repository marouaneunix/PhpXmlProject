<!DOCTYPE html>
<?php
session_start();
if($_SESSION['logged-in'] == false || $_SESSION['type'] != 'admin')
	header('Location: 404.php');
?>
<html>
<head>
    <link   href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Student</h3>
                    </div>
             
                    <form class="form-horizontal" action="../controleur/create_user.php" method="post">
                      <div class="control-group">
                        <label class="control-label">CNE</label>
                        <div class="controls">
                            <input name="cne" type="text"  placeholder="CNE" value="">
                            
                                <span class="help-inline"></span>
                          
                        </div>
                      </div>

                      <div class="control-group ">
                        <label class="control-label">Nom</label>
                        <div class="controls">
                            <input name="nom" type="text"  placeholder="Nom" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Prenom</label>
                        <div class="controls">
                            <input name="prenom" type="text"  placeholder="Prenom" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ville</label>
                        <div class="controls">
                            <input name="ville" type="text"  placeholder="Ville" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Code Postale</label>
                        <div class="controls">
                            <input name="codePostale" type="text"  placeholder="Code Postale" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="password"  placeholder="Password" value="">
                                <span class="help-inline"></span>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" name="submit" value="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="admin.php">Back</a>
                        </div>
                    
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
