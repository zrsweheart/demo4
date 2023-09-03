  <?php

    // .连接数据库
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=php;","root","123456");
    }catch(PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }
    // .防止中文乱码
    $pdo->query("SET NAMES 'UTF8'");       // .拼接sql语句，取出信息
     $id = $_GET['id'];
     $sql = "DELETE FROM dingdan WHERE id='{$id}'";
   $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('数据删除成功!');
                               window.location='dingdan.php'; //跳转
                    </script>";
        } else {
            echo "<script> alert('数据删除失败!');
                               window.history.back(); //返回上一页
                    </script>";
        }
    ?>
