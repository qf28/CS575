package Service;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;


public class GetConfigService {
	
	@Override
	public String toString() {
		return "GetConfigService [hostname=" + hostname + ", port=" + port
				+ ", dbname=" + dbname + ", tablename=" + tablename
				+ ", username=" + username + ", password=" + password
				+ ", senderemail=" + senderemail + "]";
	}
	public String getHostname() {
		return hostname;
	}
	public String getPort() {
		return port;
	}
	public String getDbname() {
		return dbname;
	}
	public String getTablename() {
		return tablename;
	}
	public String getUsername() {
		return username;
	}
	public String getPassword() {
		return password;
	}
	public String getSenderemail() {
		return senderemail;
	}
	
	
	private String hostname;
	private String port;
	private String dbname;
	private String tablename;
	private String username;
	private String password;
	private String senderemail;
	private String senderpassword;
	
	public String getSenderpassword() {
		return senderpassword;
	}
	public static void main(String[] args) throws InterruptedException{
		GetConfigService a = new GetConfigService();
		try {
			a.processConfig();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.out.println(a);
		
	}
	
	
	public GetConfigService() {
		try {
			processConfig();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public void processConfig() throws IOException{
	    BufferedReader br = new BufferedReader(new FileReader("config"));
	    try {
	       
	        String line;

	        while ((line = br.readLine()) != null) {

	            String[] tmp = line.split(",");
	            if(tmp[0].equals("hostname")){
	            	hostname = tmp[1];
	            }
	            if(tmp[0].equals("port")){
	            	port = tmp[1];
	            }
	            if(tmp[0].equals("dbname")){
	            	dbname = tmp[1];
	            }
	            if(tmp[0].equals("tablename")){
	            	tablename = tmp[1];
	            }
	            if(tmp[0].equals("username")){
	            	username = tmp[1];
	            }
	            if(tmp[0].equals("password")){
	            	password = tmp[1];
	            }
	            if(tmp[0].equals("senderemail")){
	            	senderemail = tmp[1];
	            }
	            if(tmp[0].equals("senderpassword")){
	            	senderpassword = tmp[1];
	            }	            
	        }

	    } finally {
	        br.close();
	    }
	    
	    
	}
	
}
