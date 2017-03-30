<%@ page import="Utilities.Util" %>
<%--
  Created by IntelliJ IDEA.
  User: AshishK
  Date: 2017-03-27
  Time: 3:10 AM
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SmartRefrigerator</title>
    <link rel="stylesheet" href="homepage2.css">
</head>
<body>

<form style="margin-top: 10%">
    <div class="picture_container">
        <img src="Resources/<%=request.getParameter("userID")%>.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b><%=Util.getName(request.getParameter("userID"))%></b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <button type="submit">Login</button>
    </div>
</form>

</body>
</html>