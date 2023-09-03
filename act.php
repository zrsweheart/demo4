<?php
//操作数据的增删改update

// .连接数据库
try {
    $pdo = new PDO("mysql:host=localhost;dbname=php;", "root", "123456");

} catch (PDOException $e) {
    die("数据库连接失败" . $e->getMessage());
}
// .防止中文乱码
$pdo->query("SET NAMES 'UTF8'");
// .通过action的值进行对应操作
switch ($_GET['action']) {
    case 'add':
    {   //增加操作
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
         $leibie = $_POST['leibie'];

        //写sql语句
        $sql = "INSERT INTO gouwuche ( name,price,img,leibie)VALUES ( '{$name}','{$price}','{$img}' ,'{$leibie}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo"$img";
            echo "<script> //alert('增加成功');
                               window.location='test1.php'; //跳转
                    </script>";
        } else {
            echo "<script> alert('增加失败');
                               window.history.back(); //返回上一页
                    </script>";
        }
        break;
    }
case 'adduser':
    {   //增加操作
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email=$_POST['email'];
        $sex=$_POST['sex'];
        $phone= $_POST['phone'];
        
        //写sql语句
        $sql = "INSERT INTO login ( username,password,email,sex,phone)VALUES ( '{$name}','{$password}','{$email}' ,'{$sex}','{$phone}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
             
            echo "<script> //alert('注册成功');
                               window.location='login.html'; //跳转
                    </script>";
        } else {
            echo "<script> alert('增加失败');   
            window.history.back(); //返回上一页
                    </script>";
        }
        break;
    }
 


    case 'adddingdan':
    {   //增加操作
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
         $people= $_POST['people'];
         $place= $_POST['place'];
         $phone= $_POST['phone'];
         $zhifu= $_POST['zhifu'];
         $peisong= $_POST['peisong'];

        //写sql语句
        $sql = "INSERT INTO dingdan (name,price,img,people,place,phone,zhifu,peisong)VALUES ('{$name}','{$price}','{$img}' ,'{$people}','{$place}','{$phone}','{$zhifu}','{$peisong}' )";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo"$img";
            echo "<script> //alert('增加成功');
                               window.location='test1.php'; //跳转
                    </script>";
        } else {
            echo "<script> alert('增加失败');
                               window.history.back(); //返回上一页
                    </script>";
        }
        break;
    }


case 'addshangpin':
    {   //增加操作
        $name = $_POST['name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
         $leibie = $_POST['leibie']; 

        //写sql语句
        $sql = "INSERT INTO shangpin ( name,price,img,leibie)VALUES ( '{$name}','{$price}','{$img}' ,'{$leibie}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
             
            echo "<script> //alert('增加成功');
                               window.location='test1.php'; //跳转
                    </script>";
        } else {
            echo "<script> alert('增加失败');
                               window.history.back(); //返回上一页
                    </script>";
        }
        break;
    }



    case "del":
    {    // .获取表单信息
        //通过id删除信息
        $id = $_GET['id'];
        $sql = "DELETE FROM dingdan WHERE id='{$id}'";
      $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('数据删除成功!');
                               window.location='ex01b.php'; //跳转
                    </script>";
        } else {
            echo "<script> alert('数据删除失败!');
                               window.history.back(); //返回上一页
                    </script>";
        }

        break;
    }
    case "edit" :
    {   // .获取表单信息
        //原id
        $id = $_POST['id'];
        //表单信息
      //修改之后的信息
         
        
         $people= $_POST['people'];
         $place= $_POST['place'];
         $phone= $_POST['phone'];
         $zhifu= $_POST['zhifu'];
         $peisong= $_POST['peisong'];
        $sql = "UPDATE dingdan SET people='{$people}',place='{$place}',phone='{$phone}',zhifu='{$zhifu}',peisong='{$peisong}' WHERE id='{$id}'";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script>alert('修改成功');window.location='dingdan.php'</script>";
        } else {
            echo "<script>alert('修改失败');window.history.back()</script>";
        }
        break;
    }

}