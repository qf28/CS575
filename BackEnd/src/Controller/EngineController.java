package Controller;


import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import Model.ProductModel;
import Service.DBdriverService;
import Service.EmailService;

public class EngineController {
	
	 	private ArrayList<ProductModel>  results = new ArrayList<ProductModel>();
	 

	 	// get result from database
		public void getDatafromDB(){
			DBdriverService dao = new DBdriverService();
			try {
				dao.readDataBase();
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			results = dao.getQuery();
			
		}
	
	
		// crawl website to get patterns of each price link
		// this can be optimized in the future
		public void crawlerwebSetPattern(){
			for(ProductModel p : results){
				
				if(p.getLink() == null) continue;
				URL oracle = null;
				try {
					oracle = new URL(p.getLink());
					BufferedReader in = null;
					in = new BufferedReader(
							new InputStreamReader(oracle.openStream()));	    	
					String inputLine;
						
					while ((inputLine = in.readLine()) != null){

						if (inputLine.contains(p.getInitial())){
							if(inputLine.length()<1000){
								String[] tmp = inputLine.split(p.getInitial());
								ArrayList<String> pattern = new ArrayList<String>();
								pattern.add(tmp[0]);
								pattern.add(tmp[1]);
								p.setPattern(pattern);
								System.err.println(tmp[1]);
								break;
								
							}

						}
					}
					in.close();
				} catch (IOException e1) {
					e1.printStackTrace();
				} 
				
				
			}
			
		}
		

		// search whether the price is decreasing or not
		public void crawlerwebSearch(){
			
			for(ProductModel p : results){
				if(p.getLink() == null) continue;
				URL oracle = null;
				try {
					oracle = new URL(p.getLink());
					BufferedReader in = null;
					in = new BufferedReader(
							new InputStreamReader(oracle.openStream()));	    	
					String inputLine;
						

					String pattern1 = p.getPattern().get(0);
					String pattern2 = p.getPattern().get(1);
					
					Pattern ptn = Pattern.compile(Pattern.quote(pattern1) + "(.*?)" + Pattern.quote(pattern2));

					while ((inputLine = in.readLine()) != null){

						Matcher m = ptn.matcher(inputLine);
						
						while (m.find()) {
						  System.out.println(m.group(1));
						  if(Float.valueOf(m.group(1)) <= Float.valueOf(p.getTarget())){
							  if(p.getEmail() != null)
//								  System.err.println(p.getEmail());
							  sendEmail("fengqiong87@gmail.com",p.getLink());
						  }
						}
					}
					in.close();
				} catch (IOException e1) {
					e1.printStackTrace();
				} 
				
				
			}
			
		}
	
		// send emails
		public void sendEmail(String email, String website){
			
			EmailService test = new EmailService(email, website);
			test.sendEmail();
			
		}

	    public static void main(String[] args) throws InterruptedException{
	    	
	    	EngineController engine = new EngineController();
	    	engine.getDatafromDB();
	    	engine.crawlerwebSetPattern();
	    	engine.crawlerwebSearch();
	    	// in the future, let clients specify this parameter
//	    	while(true){
//	    		Thread.sleep(60000);      
//	    	}
	    }


	 
}