<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'act.php?action=del&id=' + id;
            }
        }
    </script>

</head>
<style>
     button { /* 按钮美化 */
      width: 80px; /* 宽度 */
      height: 40px; /* 高度 */
      border-width: 0px; /* 边框宽度 */
      border-radius: 10px; /* 边框半径 */
      background: #f7a26e; /* 背景颜色 */
      cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
      outline: none; /* 不显示轮廓线 */
      font-family: "幼圆"; /* 设置字体 */
      color: white; /* 字体颜色 */
      font-size: 15px; /* 字体大小 */
    }
    button:hover { /* 鼠标移入按钮范围时改变颜色 */
      background: #f6c6a8;
    }

div{
    width: 350px;
    height: 400px;
    float: left;
     border-radius: 30px;
     background-color: #ffffff;
     padding:10px;
}

</style>
<body>
<center>
 
     
 
      <?php
        //1.连接数据库
       if(empty($_POST['title']))
       {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=php;", "root", "123456");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'UTF8'");
        
        //3.执行sql语句，并实现解析和遍历 

             $sql="SELECT * FROM shangpin ";
 
        foreach ($pdo->query($sql) as $row) {
    echo"<div>";
           echo " <img src=".$row['img']."> ";
            
            echo "<p>{$row['name']}</p>";
         
echo " <a href='xiangqing.php?id={$row['id']}'><button>查看详情</button></a>";
           
                   echo" </div>";
        
        }
       }
       else{


      $name = $_POST['title'];
        
        //写sql语句
       
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=php;", "root", "123456");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'UTF8'");
        
        //3.执行sql语句，并实现解析和遍历 

             $sql="SELECT * FROM shangpin WHERE name like '%".$name."%'";
 
        foreach ($pdo->query($sql) as $row) {
    echo"<div>";
           echo " <img src=".$row['img']."> ";
            
            echo "<p>{$row['name']}</p>";
         
echo " <a href='xiangqing.php?id={$row['id']}'><button>查看详情</button></a>";
           
                   echo" </div>";
        
        }
         }

        ?>  
   
     


</div>

</center>
</body>
</html>
 