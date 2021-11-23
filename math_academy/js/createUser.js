const teacherCreateUser = async() => {
    const teacherNameInput = document.querySelector(".teacherNameInput").value;
    const addressInput = document.querySelector(".addressInput").value;
    const phoneInput = document.querySelector(".phoneInput").value;
    const genderInput = document.querySelector(".genderInput").value;
    const ageInput = document.querySelector(".ageInput").value;
    if(teacherNameInput && addressInput && phoneInput || genderInput || ageInput){
        try{
            const response = await axios.post("../php/teacherCreate.php",{
                teacherNameInput :teacherNameInput,
                addressInput : addressInput,
                phoneInput : phoneInput,
                genderInput : genderInput,
                ageInput : ageInput
            })
            if(response.data){
                console.log(response.data);
            }else{
                console.log("입력 실패");
            }
        }catch(error){
            console.log(error);
        }
    }
};


const studentCreateUser = async() => {
    const studentNameInput = document.querySelector(".studentNameInput").value;
    const schoolInput = document.querySelector(".schoolInput").value;
    const gradeInput = document.querySelector(".gradeInput").value;
    const testScoreInput = document.querySelector(".testScoreInput").value;
    if(studentNameInput && schoolInput && gradeInput && testScoreInput){
        try{
            const response = await axios.post("../php/studentCreate.php",{
                studentNameInput :studentNameInput,
                schoolInput : schoolInput,
                gradeInput : gradeInput,
                testScoreInput : testScoreInput,
            })
            if(response.data){
                console.log(response.data);
            }else{
                console.log("입력 실패");
            }
        }catch(error){
            console.log(error);
        }
    }
};