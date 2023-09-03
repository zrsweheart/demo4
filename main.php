<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <script th:src="@{/layuimini/js/lay-module/echarts/echarts.js}"></script>
  <script th:src="@{/layuimini/js/lay-module/echarts/wordcloud.js}"></script>
  <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
  <script src="https://www.layuicdn.com/layui/layui.js"></script>
  <style>
    .success {
      background-color: rgba(199, 199, 199, 0.94);
    }

    #container1 {
      box-shadow: 5px 5px 5px 5px #b6b6b6;
      border-radius: 20px;
    }

    #container2 {
      box-shadow: 5px 5px 5px 5px #b6b6b6;
      border-radius: 20px;
    }
    /*整个tab层居中，宽度为600px*/
    #tabDiv {
      width: 600px;
      margin: 1em auto;
      padding-bottom: 10px;
      border-right: #ffffff 1px solid;
      border-top: #ffffff 1px solid;
      border-left: #ffffff 1px solid;
      border-bottom: #ffffff 1px solid;
      background-color:#fffef9 ;

    }
    /*tab头的样式*/
    #tabsHead {

      height: 226px;
      background-color:#9bc1d2 ;


    }
    /*已选tab头（超链接）的样式*/
    .curtab {
      padding-top: 0px;
      padding-right: 10px;
      padding-bottom: 0px;
      padding-left: 10px;
      border-right: #294224 1px solid;
      font-weight: bold;
      float: left;
      cursor: pointer;

    }
    /*未选tab头（超链接）的样式*/
    .tabs {
      border-right: #ffffff 1px solid;
      padding-top: 0px;
      padding-right: 10px;
      padding-bottom: 0px;
      padding-left: 10px;
      font-weight: normal;
      float: left;
      cursor: pointer;
    }
    a {
      color: #00000;
      text-decoration:none;
      font-size:15px;/*设置字体大小*/
      font-weight:3px;/*调整字体粗细*/

    }

    a:hover {
      color: #f5eae2;

      font-size: 15px;
    }
    .select{
      background:#fafdfe;
      height:40px;
      width:500px;
      line-height:28px;
      border:1px solid #ffffff;
      -moz-border-radius:2px;
      -webkit-border-radius:2px;
      border-radius:30px;
    }
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
      font-size: 17px; /* 字体大小 */
    }
    button:hover { /* 鼠标移入按钮范围时改变颜色 */
      background: #f6c6a8;
    }
  </style>
  <script type="text/jscript">
        //显示tab（tabHeadId：tab头中当前的超链接；tabContentId要显示的层ID）
        function showTab(tabHeadId,tabContentId)
        {
            //tab层
            var tabDiv = document.getElementById("tabDiv");
            //将tab层中所有的内容层设为不可见
            //遍历tab层下的所有子节点
            var taContents = tabDiv.childNodes;
            for(i=0; i<taContents.length; i++)
            {
                //将所有内容层都设为不可见
                if(taContents[i].id!=null && taContents[i].id != 'tabsHead')
                {
                    taContents[i].style.display = 'none';
                }
            }
            //将要显示的层设为可见
            document.getElementById(tabContentId).style.display = 'block';
            //遍历tab头中所有的超链接
            var tabHeads = document.getElementById('tabsHead').getElementsByTagName('a');
            for(i=0; i<tabHeads.length; i++)
            {
                //将超链接的样式设为未选的tab头样式
                tabHeads[i].className='tabs';
            }
            //将当前超链接的样式设为已选tab头样式
            document.getElementById(tabHeadId).className='curtab';
            document.getElementById(tabHeadId).blur();
        }
</script>





</head>


<div id="tabDiv" style="width:100%;height:100%;margin: auto; ">

  <div id="tabsHead" style="width:100%;height:30px;text-align:center; background-color: #ffffff ">
    <a  class="curtab" href="shenfen.html">登录|注册</a>

    <a id="tabs1" class="curtab" href="javascript:showTab('tabs1','tabContent1')">首页</a>
   
    

  </div>

  <div id="tabContent1" class="main" style="width:100%;height:100%;position:relative;background-color: #f5eae2;">
   
    <form class="layui-form"action="test1.php" method="post" target="hideIframe1" >
  <p>&nbsp;</p>
            <p style="text-align: center;">&nbsp; 
              <input type="text" name="title" id="title"value="宝贝| "class="select"> <button type="submit" >搜索</button>
   </p>
      
            <p>&nbsp;</p>
            <p>&nbsp;</p>
      
    </form>

    <div class="container3"style="border-radius:30px;border:10px solid #ffffff;background-color:#ffffff;width:80% ;margin:auto;">
      <iframe id="myIframe1" name="hideIframe1" style="" src="test1.php" frameborder="0" width="100%" height="850px"></iframe>
    </div>
  </div>


  

</html>