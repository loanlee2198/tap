<%@ page language="java" contentType="text/html; charset=utf-8"
    pageEncoding="utf-8"%>
<%@ page language="java" import="java.util.ArrayList" %>
<%@ page language="java" import="model.bean.Wife" %>
<!DOCTYPE html>
<html>
<head>
<meta  http-equiv="Content-Type" content = "text/html;charset=utf-8">
<title>welcome</title>
</head>
<body>
<table>
<%
ArrayList<Wife> wifeArray = (ArrayList<Wife>)request.getAttribute("wifeArray");
for(int i = 0; i < wifeArray.size(); i++){
%>
<tr>
	<td><%= wifeArray.get(i).getName() %></td>
	<td><%= wifeArray.get(i).getAddress() %></td>
	<td><%= wifeArray.get(i).isAlive() %></td>
</tr>
<% } %>
</table>
</body>
</html>