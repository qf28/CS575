package Service;
import java.io.Closeable;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Date;

import Model.ProductModel;

public class DBdriverService {
	  private Connection connect = null;
	  private Statement statement = null;
	  private ResultSet resultSet = null;
	  
	  private ArrayList<ProductModel>  results = new ArrayList<ProductModel>();

	  public static void main(String[] args){
		  DBdriverService dao = new DBdriverService();
		  try {
			  dao.readDataBase();
			  System.err.println(dao.getQuery());
		  } catch (Exception e) {
			  e.printStackTrace();
		  }  
	  }
  
  

		// connect and query from database 		
	  public void readDataBase() throws Exception {
		  
		  	try {
			  // connect by using mysql driver
			  	Class.forName("com.mysql.jdbc.Driver");
	    	
		    	connect = DriverManager.getConnection("jdbc:mysql://localhost:3306/cakephp","root","123");

		    	statement = connect.createStatement();
		    	
		    	resultSet = statement.executeQuery("select * from posts");
		      
		    	writeQuery(resultSet);

		      
		    } catch (Exception e) {
		    	
		    	System.err.println(e);
		    	
		    } finally {
		    	
		    	close();
		    }

	  }


		// write query result to data structure products	  
	  private void writeQuery(ResultSet resultSet) throws SQLException {
		  

		  while (resultSet.next()) {

			  String user = resultSet.getString("title");
			  String email = resultSet.getString("email");
			  String link = resultSet.getString("link");
			  String initial = resultSet.getString("initial");
			  String target = resultSet.getString("target");
			  ArrayList<String> pattern = null;
			  ProductModel p = new ProductModel(user,email,link, pattern, initial, target);
			  
			  results.add(p);

		  }
	  }
	  

	  // get results
	  public ArrayList<ProductModel> getQuery(){
		  return results;
	  }

	  
	  // close connection and resultset
	  private void close() {
		  try {
			  statement.close();
			  connect.close();
			  resultSet.close();
		  } catch (SQLException e) {
			  // TODO Auto-generated catch block
			  e.printStackTrace();
		  }
	  }
  
} 