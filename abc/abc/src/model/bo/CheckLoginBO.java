package model.bo;


import java.util.ArrayList;

import model.bean.Wife;
import model.dao.CheckLoginDAO;

public class CheckLoginBO {
	CheckLoginDAO checkLoginDAO = new CheckLoginDAO();
	public boolean isValidUser(String userName, String passWord)
	{
		return checkLoginDAO.isExistUser(userName,passWord);
	}
	public ArrayList<Wife> getWifeList(String userName)
	{
		return checkLoginDAO.getWifeList(userName);
	}
}
