package model.dao;

import java.sql.*;
import java.util.ArrayList;

import model.bean.Wife;

public class CheckLoginDAO {
	
	
	public boolean isExistUser(String userName,String passWord)
	{
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String url = "jdbc:mysql://localhost:3306/laptrinhmang";
			Connection conn = DriverManager.getConnection(url,"root","");
			Statement stmt=conn.createStatement();  
			String sql = "select * from user where userName='" + userName +
					"' and passWord='" + passWord + "'";
			ResultSet rs= stmt.executeQuery(sql);
			if (rs.next()) {
				return true;
			} 
			} catch (Exception e) {
			System.out.println("SQLException caught: " + e.getMessage());
			}
		return false;
	}		
	public ArrayList<Wife> getWifeList(String userName)
	{
		ArrayList<Wife> result = new ArrayList<Wife>();
		String name,address;
		boolean alive;
		try {
			Class.forName("com.mysql.jdbc.Driver");
			String url = "jdbc:mysql://localhost:3306/laptrinhmang";
			Connection conn = DriverManager.getConnection(url,"root","");
			Statement stmt=conn.createStatement();  
			String sql = "select * from user";
			ResultSet rs= stmt.executeQuery(sql);
			if (rs.next()) {
				name =rs.getString(3);
				address = rs.getString(4);
				alive = rs.getBoolean(5);
				
				Wife wife = new Wife();
				wife.setName(name);
				wife.setAddress(address);
				wife.setAlive(alive);
				result.add(wife);		
			} 
			} catch (Exception e) {
			System.out.println("SQLException caught: " + e.getMessage());
			}
		return result;
	}
}
