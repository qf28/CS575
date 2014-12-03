package Service;

import java.util.Properties;
 
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
 
public class EmailService {
	
	// configuration	
	private String username;
	private String password;
	private String subject = "Price Tracker: Your watched item meets your target price";
	private String emailAdr;
	private String webSite;

	// Constructor
	public EmailService(String s1, String s2){
		emailAdr = s1;
		webSite = s2;
		
		GetConfigService config = new GetConfigService();
		username = config.getSenderemail();
		password = config.getSenderpassword();
		System.out.println(username + " " + password);
	}	
	
	// Use Javax Mail to send users emails
	public void sendEmail(){
		
		Properties props = new Properties();
		props.put("mail.smtp.auth", "true");
		props.put("mail.smtp.starttls.enable", "true");
		props.put("mail.smtp.host", "smtp.gmail.com");
		props.put("mail.smtp.port", "587");
		Session session = Session.getInstance(props,
				new javax.mail.Authenticator() {
			protected PasswordAuthentication getPasswordAuthentication() {
				return new PasswordAuthentication(username, password);
			}
		});
		
 
		try {
 
			Message message = new MimeMessage(session);
			message.setFrom(new InternetAddress(username));
			message.setRecipients(Message.RecipientType.TO,
				InternetAddress.parse(emailAdr));
			message.setSubject(subject);
			message.setText("Check the websites below to find your item\n" + webSite);
 
			Transport.send(message);
 
			System.out.println("Done");
 
		} catch (MessagingException e) {
			throw new RuntimeException(e);
		}
	}
	
}