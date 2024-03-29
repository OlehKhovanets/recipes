const skillsContainer = document.getElementById('skills-container');
const addSkillButton = document.getElementById('add-skill-button');

// Add event listener for the button
addSkillButton.addEventListener('click', function () {
    event.preventDefault();

    const newSkillInput = document.createElement('input');
    newSkillInput.type = 'text';
    newSkillInput.name = 'skills[]';
    newSkillInput.className = 'margin-top hide-border';
    // newSkillInput.placeholder = 'Add your skill';

    skillsContainer.appendChild(newSkillInput);
});

const experienceContainer = document.getElementById('experience-container');
const addExperienceButton = document.getElementById('add-experience-button');

// Add event listener for the button
addExperienceButton.addEventListener('click', function () {
    event.preventDefault();

    var img = document.createElement("img");
    img.src = "/web/images/experience.png";
    img.style.height = '32px';
    img.style.width = '32px';
    img.style.marginTop = '10px';
    img.style.marginBottom = '10px';
    experienceContainer.appendChild(img);

    const labelExpTitle = document.createElement('div');
    labelExpTitle.className = 'cv-label';
    labelExpTitle.innerText = 'Job title';
    experienceContainer.appendChild(labelExpTitle);

    const newSExpPositionInput = document.createElement('input');
    newSExpPositionInput.type = 'text';
    newSExpPositionInput.name = 'position[]';
    newSExpPositionInput.className = 'margin-top hide-border';
    experienceContainer.appendChild(newSExpPositionInput);

    const labelExpDate = document.createElement('div');
    labelExpDate.className = 'cv-label';
    labelExpDate.innerText = 'Start & End Date';
    experienceContainer.appendChild(labelExpDate);

    const newSExpDateInput = document.createElement('input');
    newSExpDateInput.type = 'text';
    newSExpDateInput.name = 'exp-date[]';
    newSExpDateInput.className = 'margin-top hide-border';
    experienceContainer.appendChild(newSExpDateInput);

    const labelExpEmp = document.createElement('div');
    labelExpEmp.className = 'cv-label';
    labelExpEmp.innerText = 'Employer';
    experienceContainer.appendChild(labelExpEmp);

    const newSExpCompanyInput = document.createElement('input');
    newSExpCompanyInput.type = 'text';
    newSExpCompanyInput.name = 'company[]';
    newSExpCompanyInput.className = 'margin-top hide-border';
    experienceContainer.appendChild(newSExpCompanyInput);

    const labelExpDesc = document.createElement('div');
    labelExpDesc.className = 'cv-label';
    labelExpDesc.innerText = 'Description';
    experienceContainer.appendChild(labelExpDesc);

    const newSExpTasksInput = document.createElement('input');
    newSExpTasksInput.type = 'text';
    newSExpTasksInput.name = 'tasks[]';
    newSExpTasksInput.className = 'margin-top hide-border';
    experienceContainer.appendChild(newSExpTasksInput);

});

//education
const educationContainer = document.getElementById('education-container');
const addEducationButton = document.getElementById('add-education-button');

// Add event listener for the button
addEducationButton.addEventListener('click', function () {
    event.preventDefault();

    var img = document.createElement("img");
    img.src = "/web/images/education.png";
    img.style.height = '32px';
    img.style.width = '32px';
    img.style.marginTop = '10px';
    img.style.marginBottom = '10px';
    educationContainer.appendChild(img);

    const labelEdSchool = document.createElement('div');
    labelEdSchool.className = 'cv-label';
    labelEdSchool.innerText = 'School';
    educationContainer.appendChild(labelEdSchool);


    const newSEdUniversityInput = document.createElement('input');
    newSEdUniversityInput.type = 'text';
    newSEdUniversityInput.name = 'university[]';
    newSEdUniversityInput.className = 'margin-top hide-border';
    educationContainer.appendChild(newSEdUniversityInput);

    const labelEdDate = document.createElement('div');
    labelEdDate.className = 'cv-label';
    labelEdDate.innerText = 'Start & End Date';
    educationContainer.appendChild(labelEdDate);

    const newSEdDateInput = document.createElement('input');
    newSEdDateInput.type = 'text';
    newSEdDateInput.name = 'ed-date[]';
    newSEdDateInput.className = 'margin-top hide-border';
    educationContainer.appendChild(newSEdDateInput);

    const labelEdFaculty = document.createElement('div');
    labelEdFaculty.className = 'cv-label';
    labelEdFaculty.innerText = 'Faculty';
    educationContainer.appendChild(labelEdFaculty);

    const newSEdFacultyInput = document.createElement('input');
    newSEdFacultyInput.type = 'text';
    newSEdFacultyInput.name = 'faculty_of[]';
    newSEdFacultyInput.className = 'margin-top hide-border';
    educationContainer.appendChild(newSEdFacultyInput);

    const labelEdDegree = document.createElement('div');
    labelEdDegree.className = 'cv-label';
    labelEdDegree.innerText = 'Degree';
    educationContainer.appendChild(labelEdDegree);

    const newSEdDegreeInput = document.createElement('input');
    newSEdDegreeInput.type = 'text';
    newSEdDegreeInput.name = 'degree[]';
    newSEdDegreeInput.className = 'margin-top hide-border';
    educationContainer.appendChild(newSEdDegreeInput);
});

//language

const languagesContainer = document.getElementById('languages-container');
const addLanguagesButton = document.getElementById('add-languages-button');

// Add event listener for the button
addLanguagesButton.addEventListener('click', function () {
    event.preventDefault();

    const newLanguageInput = document.createElement('input');
    newLanguageInput.type = 'text';
    newLanguageInput.name = 'languages[]';
    newLanguageInput.className = 'margin-top hide-border';
    // newLanguageInput.placeholder = 'Add your language(Name of language - level)';

    languagesContainer.appendChild(newLanguageInput);
});


//redirect after success
$(document).ready(function(){
    // Відслідковування кліків на кнопку
    $("#generate-pdf").click(function(){
        // Посилання, на яке ви хочете перейти
        var url = "/cv/success";

        // Відкриття посилання у новій вкладці
        window.open(url, "_blank");
    });
});
