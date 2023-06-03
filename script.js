// Sample course data
var courses = [
    { title: 'Introduction to Programming', instructor: 'John Doe' },
    { title: 'Web Development Basics', instructor: 'Jane Smith' },
    { title: 'Data Science Fundamentals', instructor: 'Mike Johnson' }
  ];
  
  // Function to add a course to the course list
  function addCourse(title, instructor) {
    var courseList = document.getElementById('course-list');
  
    // Create a new course element
    var courseElement = document.createElement('div');
    courseElement.classList.add('course');
    courseElement.innerHTML = `
      <h2>${title}</h2>
      <p>Instructor: ${instructor}</p>
    `;
  
    // Append the course element to the course list
    courseList.appendChild(courseElement);
  }
  
  // Function to handle the "Add Course" button click event
  function handleAddCourse() {
    var title = prompt('Enter the course title:');
    var instructor = prompt('Enter the instructor name:');
  
    // Add the course to the course list
    addCourse(title, instructor);
  }
  
  // Add event listener to the "Add Course" button
  var addCourseButton = document.getElementById('add-course-button');
  addCourseButto99*n.addEventListener('click', handleAddCourse);
  
  // Add existing courses to the course list
  courses.forEach(function(course) {
    addCourse(course.title, course.instructor);
  });