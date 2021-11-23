let datas;
let index = 0;

const changeInfo = () => {
    document.querySelector(".teacherName").textContent = datas[index].teacherName;
    document.querySelector(".address").textContent = datas[index].address;
    document.querySelector(".phone").textContent = datas[index].phone;
    document.querySelector(".gender").textContent = datas[index].gender;
    document.querySelector(".age").textContent = datas[index].age;
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
        const response = await axios.get("../php/getTeacherInfo.php");
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
    const teacherNameInput = document.querySelector(".correctTeacherName").value;
    const addressInput = document.querySelector(".correctAddress").value;
    const phoneInput = document.querySelector(".correctPhone").value;
    const genderInput = document.querySelector(".correctGender").value;
    const ageInput = document.querySelector(".correctAge").value;
    if(addressInput || phoneInput || genderInput || ageInput){
        try{
            const response = await axios.post("../php/correctionTeacherInfo.php",{
                teacherNameInput : teacherNameInput,
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
        }catch (error){
            console.log(error);
        }
    }
}

const deleteInfo = async() => {
    const teacherNameInput = document.querySelector(".correctTeacherName").value;
    if(teacherNameInput){
        try{
            const response = await axios.post("../php/deleteTeacher.php",{
                teacherNameInput : teacherNameInput});

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