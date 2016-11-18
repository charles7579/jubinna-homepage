<html>
<head>
<meta http-equiv=Content-Type Content="text/html; charset=utf-8">
</head>
<body>
 <form enctype="multipart/form-data" action="uploadtest.php" method="POST"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="2048000000" /> 
    이 파일을 전송합니다: <input name="userfile" type="file" /> 
    <input type="submit" value="파일 전송" /> 
 </form> 

 <?php 
 // uploads디렉토리에 파일을 업로드합니다. 
 $uploaddir = '/var/www/ams/video/'; 
 $uploadfile = $uploaddir.basename($_FILES['userfile']['name']); 
 echo $uploadfile;
 echo '<pre>'; 
 if($_POST['MAX_FILE_SIZE'] < $_FILES['userfile']['size']){ 
      echo "업로드 파일이 지정된 파일크기보다 큽니다.\n"; 
 } else { 
     if(($_FILES['userfile']['error'] > 0) || ($_FILES['userfile']['size'] <= 0)){ 
          echo "파일 업로드에 실패하였습니다."; 
     } else { 
          // HTTP post로 전송된 것인지 체크합니다. 
          if(!is_uploaded_file($_FILES['userfile']['tmp_name'])) { 
                echo "HTTP로 전송된 파일이 아닙니다."; 
          } else { 
                // move_uploaded_file은 임시 저장되어 있는 파일을 ./uploads 디렉토리로 이동합니다. 
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
                     echo "성공적으로 업로드 되었습니다.\n"; 
                } else { 
                     echo "파일 업로드 실패입니다.\n"; 
                } 
          } 
     } 
 } 

 print_r($_FILES); 

 /* 
 결과: 
 성공적으로 업로드 되었습니다. 
 Array 
 ( 
    [userfile] => Array 
        ( 
            [name] => config.sys 
            [type] => text/plain 
            [tmp_name] => /tmp/phpXTtzBW 
            [error] => 0 
            [size] => 10 
        ) 
 ) 
 */ 
 ?> 

</body>
</html>
