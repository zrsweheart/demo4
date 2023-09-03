<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script th:src="@{/layuimini/js/lay-module/echarts/echarts.js}"></script>
    <script th:src="@{/layuimini/js/lay-module/echarts/wordcloud.js}"></script>
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="https://www.layuicdn.com/layui/layui.js"></script>
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
</style>
</head>

 
 
<table class="layui-table" id="table1">
   <h1>订单管理</h1>
<br/>
<br/>
     
    <tr>
         <th >商品id</th>
        <th  >收货人</th>
                    
        <th  >收货人地址</th>
        
    
        <th  >订单金额</th>
        <th >手机号</th>
        <th  >商品 名称</th>
         
        <th  >操作</th>
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
        $sql = "SELECT * FROM dingdan ";
        foreach ($pdo->query($sql) as $row) {
    echo "<tr>";
         echo "<td>{$row['id']}</td>";
            echo "<td> {$row['people']}</td>";
            echo "<td>{$row['place']}</td>";
           
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>
                    <a href='deldingdan.php?id={$row['id']}' >删除</a>   

                    <a href='updingdan.php?id={$row['id']}' >修改</a>   
                   </td>";
            echo "</tr>";
        
        }

        ?>  
              

            

</table>
 
<br/>
<hr>
<span> ©版权所有：石家庄铁道大学信息科学与技术学院  </span>
<script>
    function check()
    {
        if(confirm("是否确定删除该订单?"))
        {
            return true;
        }
        return false;
    }
</script>
</body>
</html>