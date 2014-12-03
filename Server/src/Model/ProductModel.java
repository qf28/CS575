package Model;
import java.util.ArrayList;
import java.util.List;


public class ProductModel {

	
	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getLink() {
		return link;
	}

	public void setLink(String link) {
		this.link = link;
	}

	public String getInitial() {
		return initial;
	}

	public void setInitial(String initial) {
		this.initial = initial;
	}

	public String getTarget() {
		return target;
	}

	public void setTarget(String target) {
		this.target = target;
	}

	private String name;
	private String email;
	private String link;
	
	public ArrayList<String> getPattern() {
		return pattern;
	}

	public ProductModel(String name, String email, String link,
			ArrayList<String> pattern, String initial, String target) {
		super();
		this.name = name;
		this.email = email;
		this.link = link;
		this.pattern = pattern;
		this.initial = initial;
		this.target = target;
	}

	public void setPattern(List<String> pattern2) {
		this.pattern = (ArrayList<String>) pattern2;
	}

	private ArrayList<String> pattern;
	private String initial;
	private String target;


	@Override
	public String toString() {
		return "Product [name=" + name + ", email=" + email + ", link=" + link
				+ ", pattern=" + pattern + ", initial=" + initial + ", target="
				+ target + "]";
	}
	
}
