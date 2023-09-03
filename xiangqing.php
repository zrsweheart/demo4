<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
<style type="text/css">
   button { /* 按钮美化 */
      width: 100px; /* 宽度 */
      height: 30px; /* 高度 */
      border-width: 0px; /* 边框宽度 */
      border-radius: 10px; /* 边框半径 */
      background: #f48560; /* 背景颜色 */
      cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
      outline: none; /* 不显示轮廓线 */
      font-family: "幼圆"; /* 设置字体 */
      color: white; /* 字体颜色 */
      font-size: 15px; /* 字体大小 */
    }
    button:hover { /* 鼠标移入按钮范围时改变颜色 */
      background: #f6c6a8;
    }
     span{
            color: red;
            font-size: 30px;
            font-family: "宋体";
        }
</style>
</head>
<body>
<center>
    <?php
    // .连接数据库
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=php;","root","123456");
    }catch(PDOException $e){
        die("数据库连接失败".$e->getMessage());
    }
    // .防止中文乱码
    $pdo->query("SET NAMES 'UTF8'");       // .拼接sql语句，取出信息
    $sql = "SELECT * FROM shangpin WHERE id =".$_GET['id'];
    $stmt = $pdo->query($sql);//返回预处理对象
    if( !empty($stmt) &&$stmt->rowCount()> 0){
        $stu = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
    }else{
        die("没有要修改的数据！");
    }
    ?>

<?php
$json = json_encode($stu);
$obj = json_decode($json);
 ?>
  <form id="editstu" name="editstu" method="post" action="act.php?action=add">
    <div class="container3"style="border-radius:30px;border:10px solid #ffffff;background-color:#ffffff;width:80% ;margin:auto;">
      <table style="border-width: 0; width: 100%">
        <tr>
          <td rowspan="3" style="width: 300px; text-align: center"><img src="<?php
echo $obj->img?>"></td>
          <td colspan="3" rowspan="3">
            <table border="0" >
              <tr>
                <td  colspan="2" rowspan="2" style="width: 50% ;font-size:25px; "><?php
echo $obj->name?></td>
                <td >&nbsp;</td>
              </tr>
              <tr>
               <td >&nbsp;</td>
                <td >&nbsp;</td>
              </tr>
              <tr>
                <td  colspan="2" >价格：<span><?php
echo $obj->price?></span></td>
                  <td >&nbsp;</td>
              </tr>
              <tr>
                  <td  colspan="2" >样式：选择规格  </td>
                  <td >&nbsp;</td>
              </tr>
              <tr>
                  <td  colspan="2" >   </td>
                  <td >&nbsp;</td>
              </tr>
               <tr>
                
                <td style="width: 50%"> <button type="submit">加入购物车</button></td>
              </tr>
            </table>

      <input type="hidden" name="img"  value="<?php echo $obj->img?>"/>
        <input type="hidden" name="name" value="<?php echo $obj->name?>">
        <input type="hidden" name="price" value="<?php echo $obj->price?>">
         <input type="hidden" name="leibie" value="<?php echo $obj->leibie?>">
    </form>
    </div>
  </div>


</html>


 


</center>
</body>
</html>
