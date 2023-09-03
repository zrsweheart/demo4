
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车界面</title>
    <style type="text/css">


        html{font-size:12px;}
        fieldset{width:900px; margin: 0 auto;}
        legend{font-weight:bold; font-size:14px;}
        label{float:left; width:70px; margin-left:10px;}
        .left{
            margin-left:180px;
            font-size:14px
        }
        .input{width:150px;}
        .dingdan{margin-left:410px;}
        .fanhui{margin-left:50px;}
    table {

width: 90%;

background: #ffffff;

margin: 10px auto;

border-collapse: collapse;

/*border-collapse:collapse合并内外边距

(去除表格单元格默认的2个像素内外边距*/

}

th,td {

height: 25px;

line-height: 25px;

text-align: center;

border: 1px solid #ccc;

}
    </style>
</head>
<body>
   <div id="Layer1"
    style="position: absolute; width: 100%; height: 10000px;  z-index: -1">
  </div>
    <div>
<div id="logo" style="float:left; vertical-align: middle;" >
    <img  height="100" width="160" padding="10" src="https://wx4.sinaimg.cn/mw2000/008aq7W6ly1h262ry4v24j30la0lagm1.jpg" alt="logo">
    
</div>
 
<div id="fudong" style="height:80px;width:400px;">&nbsp;
    <h1>&nbsp;&nbsp;橘子巷</h1>
</div>

   
<fieldset>
    <legend><font color="black">购物车</font></legend>
       
   
     <table width="95%" border="1">
        <caption >
            <p align="left">购物车（全部3）</p></caption>
        <thead height="70">
        <th width="25%" > 商品图片</th>
          
        <th width="10%">单价</th>
        <th width="10%">名称</th>
       
        <th width="10%">操作</th>
        </thead>
        </tr>
       
      <?php
        
        //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=php;", "root", "123456");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'UTF8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM gouwuche ";
        foreach ($pdo->query($sql) as $row) {
  

    echo "<tr>";
            echo "<td> <img src=".$row['img']."></td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['name']}</td>";
           
                  
            echo "<td>
                     <a href='delgouwuche.php?id={$row['id']}'>删除</a>
                      <a href='adddingdan.php?id={$row['id']}' >购买</a>
                   </td>";
            echo "</tr>";
        
        }

        ?>  
    </table>
     
</fieldset>
</body>
</html>