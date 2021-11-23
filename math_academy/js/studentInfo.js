let datas;
let index = 0;

const changeInfo = () => {
    document.querySelector(".studentName").textContent = datas[index].studentName;
    document.querySelector(".school").textContent = datas[index].school;
    document.querySelector(".grade").textContent = datas[index].grade;
    document.querySelector(".testScore").textContent = datas[index].testScore;
};
  
const changeIndex = (mode) => {
    if (mode === "prev") {
      if (index !== 0) {
        index = index - 1;
      } else {
        index = datas.length - 1;
      }
    } else {
      if (index !== datas.length - 1) {
        index = index + 1;
      } else {
        index = 0;
      }
    }
    changeInfo();
};
  

onload = async() => {
    try{
        const response = await axios.get("../php/getStudentInfo.php");
        datas = response.data
        if(datas){
            changeInfo();
            console.log(datas);
        }
    }catch(error){
        console.log(error);
    }

};

const correctionInfo = async() => {
    const studentNameInput = document.querySelector(".correctStudentName").value;
    const schoolInput = document.querySelector(".correctSchool").value;
    const gradeInput = document.querySelector(".correctGrade").value;
    const testScoreInput = document.querySelector(".correctTestScore").value;
    if(studentNameInput || schoolInput || gradeInput || testScoreInput){
        try{
            const response = await axios.post("../php/correctionStudentInfo.php",{
                studentNameInput : studentNameInput,
                schoolInput : schoolInput,
                gradeInput : gradeInput,
                testScoreInput : testScoreInput,
            })
            if(response.data){
                console.log(response.data);
            }else{
                console.log("입력 실패");
            }
        }catch (error){
            console.log(error);
        }
    }
};


const deleteInfo = async() => {
    const studentNameInput = document.querySelector(".correctStudentName").value;
    if(studentNameInput){
        try{
            const response = await axios.post("../php/deleteStudent.php",{
                studentNameInput : studentNameInput});

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