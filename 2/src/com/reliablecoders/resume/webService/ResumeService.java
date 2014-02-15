package com.reliablecoders.resume.webService;

import java.util.ArrayList;
import java.util.List;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import org.codehaus.jettison.json.JSONException;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import com.reliablecoders.resume.dto.ResumeObject;
import com.reliablecoders.resume.model.ProjectManager;

/**
 * @author nam phan
 * @company Reliable{coders}
 */
@Path("/Web")
public class ResumeService {
	private ProjectManager projectManager = new ProjectManager();

	/**
	 * 
	 * @param rs
	 * @return
	 */
	@POST
	@Path("/addResume")
	@Consumes({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	@Produces({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	public ResumeObject create(ResumeObject rs) {
		ResumeObject resumeObject = null;
		// System.out.println("creating resume");
		try {
			resumeObject = projectManager.AddResume(rs);
		} catch (Exception e) {
			System.out.println("error" + e);
		}
		return resumeObject;
	}

	/**
	 * 
	 * @param resumeObject
	 * @return
	 */
	@POST
	@Path("/deleteResume")
	@Consumes({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	@Produces({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	public ResumeObject deleteResume(ResumeObject resumeObject) {
		System.out.println(resumeObject.getRes_id());
		return resumeObject;
	}

	/**
	 * 
	 * @param value
	 * @return
	 */
	@POST
	@Path("/UpdateResume")
	@Consumes({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	@Produces({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	public String updateResume(ResumeObject resumeObject) {
		String result = null;
		try {
			ResumeObject resumeData = projectManager.updateResume(resumeObject);
			Gson gson = new Gson();
			result = gson.toJson(resumeData);

		} catch (Exception e) {
			System.out.println("error" + e);
		}
		return result;
	}

	/**
	 * 
	 * @param array
	 * @return
	 * @throws JSONException
	 */
	@POST
	@Path("/deleteResumes")
	@Consumes({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	@Produces({ MediaType.APPLICATION_JSON, MediaType.APPLICATION_XML })
	public String deleteResumes(String array) throws JSONException {
		TypeToken<List<ResumeObject>> token = new TypeToken<List<ResumeObject>>() {
		};
		Gson gson = new Gson();
		List<ResumeObject> list = gson.fromJson(array, token.getType());
		try {
			list = projectManager.deleteResumes(list);
		} catch (Exception e) {
			e.printStackTrace();
		}
		return gson.toJson(list);
	}

	/**
	 * 
	 * @return
	 */
	@GET
	@Path("/GetAllResumes")
	@Produces("application/json")
	public String getResume() {
		String result = null;
		ArrayList<ResumeObject> resumeData = null;
		try {
			resumeData = projectManager.GetResumes();
			Gson gson = new Gson();
			result = gson.toJson(resumeData);
		} catch (Exception e) {
			System.out.println("error" + e);
		}
		return result;
	}

	/**
	 * 
	 * @param value
	 * @return
	 */
	@GET
	@Path("/Search:{value}")
	@Produces("application/json")
	public String getResume(@PathParam("value") String value) {
		String result = null;
		try {
			ArrayList<ResumeObject> resumeData = null;
			resumeData = projectManager.SearchResumes(value);
			Gson gson = new Gson();
			result = gson.toJson(resumeData);

		} catch (Exception e) {
			System.out.println("error" + e);
		}
		return result;
	}

	/**
	 * 
	 * @param value
	 * @return
	 */
	@GET
	@Path("/SearchByID:{value}")
	@Produces("application/json")
	public String getResumeByID(@PathParam("value") String value) {
		String result = null;
		try {
			ResumeObject resumeData = null;
			resumeData = projectManager.SearchByID(value);
			Gson gson = new Gson();
			// System.out.println(gson.toJson(resumeData));
			result = gson.toJson(resumeData);

		} catch (Exception e) {
			System.out.println("error" + e);
		}
		return result;
	}
}
