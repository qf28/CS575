package Service;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;


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
			  // TODO Auto-generated catch block
			  e.printStackTrace();
		  }  
	  }
  
  
	  public void readDataBase() throws Exception {
			GetConfigService config = new GetConfigService();
			
			String username = config.getUsername();
			String password = config.getPassword();
//			System.out.println(username + " " + password);
		  	try {
			  // connect by using mysql driver
			  	Class.forName("com.mysql.jdbc.Driver");
	    	
		    	connect = DriverManager.getConnection("jdbc:mysql://" + config.getHostname() + ":"
		    	+config.getPort()+"/" + config.getDbname(),username,password);

		    	statement = connect.createStatement();
		    	
		    	resultSet = statement.executeQuery("select * from products");
		      
		    	writeQuery(resultSet);

		      
		    } catch (Exception e) {
		    	
		    	System.err.println(e);
		    	
		    } finally {
		    	
		    	close();
		    }

	  }

	  
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
	  
	  public ArrayList<ProductModel> getQuery(){
		  return results;
	  }

	  
	  
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