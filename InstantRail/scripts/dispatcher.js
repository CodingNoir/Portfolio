/*
 * dispatcher.js
 * Redirects to the appropriate program based on the user selection
 * on the list screen.
 */

// Dispatches add-course-screen program. Change this all to fit the train one instead. 
function addCourse() {
	submitAction("add_course_screen.php");
}

// Dispatches edit-course-screen program.
function editCourse(courseCode) {
	document.courseListForm.courseCode.value = courseCode;
	submitAction("update_course_screen.php");
}

// Dispatches delete-course program if confirmed by user.
function deleteCourse(courseCode) {
	var confirmed = 
			confirm("Are you sure you want to delete course with code " + 
					courseCode + "?");
	if (confirmed) {
		document.courseListForm.courseCode.value = courseCode;
		submitAction("delete_course.php");
	}
}

// Sets form action to a program and submits data to that program.
function submitAction(action) {
	document.courseListForm.action = action;
	document.courseListForm.submit();
}
