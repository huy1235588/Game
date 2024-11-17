const profile = document.getElementById('addUserStepProfile');
const securityInformation = document.getElementById('addUserStepSecurityInformation');
const confirmation = document.getElementById('addUserStepConfirmation');

const cardFooter = document.getElementById('btn-form');

const stepItem = document.querySelectorAll('.step-item');
const stepContentWrapper = document.querySelectorAll('a.step-content-wrapper');

const btnNextForm = document.getElementById('btnNextForm');
const btnPreviousForm = document.getElementById('btnPreviousForm');

btnNextForm.addEventListener('click', () => {
    if (profile.classList.contains('active')) {
        profile.style.display = "none";
        securityInformation.style.display = "block";

        btnPreviousForm.style.display = "block"

        cardFooter.style.justifyContent = "space-between";

        profile.classList.remove('active');
        securityInformation.classList.add('active');

        stepItem[0].classList.remove('active');
        stepItem[1].classList.add('active');
    }

    else if (securityInformation.classList.contains('active')) {
        securityInformation.style.display = "none";
        confirmation.style.display = "block";

        securityInformation.classList.remove('active');
        confirmation.classList.add('active');

        stepItem[1].classList.remove('active');
        stepItem[2].classList.add('active');

        const firstName = document.getElementsByName("firstName")[0];
        const lastName = document.getElementsByName("lastName")[0];
        const email = document.getElementsByName("email")[0];
        const phone = document.getElementsByName("phone")[0];
        const country = document.getElementById("countryText").textContent.trim();
        const username = document.getElementsByName("username")[0];
        const password = document.getElementsByName("password")[0];
        const role = document.getElementsByName("role")[0];

        // console.log(country.textContent.trim())

        document.getElementById('confirmFullName').textContent = firstName.value + " " + lastName.value;
        document.getElementById('confirmEmail').textContent = email.value
        document.getElementById('confirmPhone').textContent = phone.value;
        document.getElementById('confirmCountry').textContent = country;
        document.getElementById('confirmUsername').textContent = username.value;
        document.getElementById('confirmPassword').textContent = password.value;
        document.getElementById('confirmRole').textContent = role.value;
    }
});

btnPreviousForm.addEventListener('click', () => {
    if (confirmation.classList.contains('active')) {
        confirmation.style.display = "none";
        securityInformation.style.display = "block";

        confirmation.classList.remove('active');
        securityInformation.classList.add('active');

        stepItem[2].classList.remove('active');
        stepItem[1].classList.add('active');
    }

    else if (securityInformation.classList.contains('active')) {
        securityInformation.style.display = "none";
        profile.style.display = "block";

        btnPreviousForm.style.display = "none"

        cardFooter.style.justifyContent = "flex-end";

        securityInformation.classList.remove('active');
        profile.classList.add('active');

        stepItem[1].classList.remove('active');
        stepItem[0].classList.add('active');
    }
});

stepContentWrapper[0].addEventListener('click', () => {
    profile.style.display = "block";
    securityInformation.style.display = "none";
    confirmation.style.display = "none";

    btnPreviousForm.style.display = "none"

    cardFooter.style.justifyContent = "flex-end";

    profile.classList.add('active');
    securityInformation.classList.remove('active');
    confirmation.classList.remove('active');

    stepItem[0].classList.add('active');
    stepItem[1].classList.remove('active');
    stepItem[2].classList.remove('active');
});

stepContentWrapper[1].addEventListener('click', () => {
    profile.style.display = "none";
    securityInformation.style.display = "block";
    confirmation.style.display = "none";

    btnPreviousForm.style.display = "block"

    cardFooter.style.justifyContent = "space-between";

    profile.classList.remove('active');
    securityInformation.classList.add('active');
    confirmation.classList.remove('active');

    stepItem[0].classList.remove('active');
    stepItem[1].classList.add('active');
    stepItem[2].classList.remove('active');
});

stepContentWrapper[2].addEventListener('click', () => {
    profile.style.display = "none";
    securityInformation.style.display = "none";
    confirmation.style.display = "block";

    btnPreviousForm.style.display = "block"

    cardFooter.style.justifyContent = "space-between";

    profile.classList.remove('active');
    securityInformation.classList.remove('active');
    confirmation.classList.add('active');

    stepItem[0].classList.remove('active');
    stepItem[1].classList.remove('active');
    stepItem[2].classList.add('active');
});


/*******************************************
* 
*          Select form
* 
*******************************************/
const countrySelect = document.getElementById('countrySelect');
const countryText = document.getElementById('countryText');

if (countrySelect.selectedIndex) {
    countryText.textContent = countrySelect.value.option[countrySelect.selectedIndex].text;
}

/*******************************************
* 
*          CropBox
* 
*******************************************/
document.addEventListener("DOMContentLoaded", () => {
    const avatarUploader = document.getElementById("avatarUploader");
    const cropBox = document.getElementById("cropBox");

    const imageToCrop = document.getElementById("imageToCrop");
    const imageToCrop2 = document.getElementById("imageToCrop2");

    const circleMaskWrapper = document.getElementById("circleMaskWrapper");
    const imgTranslate = document.getElementById("imgTranslate");
    const circleMaskWrapper2 = document.getElementById("circleMaskWrapper2");
    const imgTranslate2 = document.getElementById("imgTranslate2");

    const cropBtnSave = document.getElementById("cropBtnSave");
    const cropBtnCancel = document.getElementById("cropBtnCancel");
    const cropBtnClose = document.getElementById("cropBtnClose");

    // let cropContext = imageToCrop.getContext('2d');
    // let img = new Image();
    let imageX = 0, imageY = 0; // Offset ảnh
    let isDragging = false;
    let startX, startY;
    let heightScale; // Để thu nhỏ hình ảnh

    let cropper;

    // Xử lý khi người dùng chọn ảnh
    avatarUploader.addEventListener("change", (event) => {
        const file = event.target.files[0];
        if (file && file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imageToCrop.src = e.target.result; // Hiển thị ảnh trong box cắt
                imageToCrop2.src = e.target.result; // Hiển thị ảnh trong box cắt
                cropBox.style.display = "block";  // Hiển thị box cắt

                imageToCrop.onload = () => {
                    // chiều cao cố định
                    var desiredHeight = 400;

                    // Tính hệ số tỷ lệ cho chiều cao
                    heightScale = desiredHeight / imageToCrop.naturalHeight;

                    // Căn giữa màn hình cộng thêm circleMask 400 x 400
                    const widthTranslate = imageToCrop.naturalWidth / 2 - 200;
                    const heightTranslate = imageToCrop.naturalHeight / 2 - 200;

                    // Thu nhỏ hình ảnh
                    imgTranslate.style.transform = `scale(${heightScale})`;
                    imgTranslate2.style.transform = `scale(${heightScale})`;

                    // Căn giữa hình ảnh
                    circleMaskWrapper.style.transform = `translate(-${widthTranslate}px, -${heightTranslate}px)`;
                    circleMaskWrapper2.style.transform = `translate(-${widthTranslate}px, -${heightTranslate}px)`;
                };


                // if (cropper) cropper.destroy();   // Hủy cropper cũ nếu có
                // cropper = new Cropper(imageToCrop, {
                //     aspectRatio: 1, // Tỉ lệ khung hình (ví dụ: 1:1)
                //     viewMode: 1,
                // });
            };
            reader.readAsDataURL(file);
        }
        else {
            document.getElementsByClassName("error-pop")[0].style.display = "block";
            errorHeader = "Error";
            errorDetail = "The selected file is not an image.";
        }
    });

    // Hàm vẽ ảnh và vòng tròn lên canvas
    // function drawImage() {
    //     cropContext.clearRect(0, 0, imageToCrop.width, imageToCrop.height);
    //     cropContext.drawImage(img, imageX, imageY);

    //     // Tạo vùng tối xung quanh hình tròn
    //     cropContext.save();
    //     cropContext.beginPath();
    //     cropContext.arc(
    //         imageToCrop.width / 2,
    //         imageToCrop.height / 2,
    //         Math.min(imageToCrop.width, imageToCrop.height) / 4, // Bán kính vòng tròn
    //         0,
    //         Math.PI * 2
    //     );
    //     cropContext.strokeStyle = 'red';
    //     cropContext.lineWidth = 2;
    //     cropContext.clip();
    //     cropContext.closePath();
    //     cropContext.restore();

    //     // // Vẽ vòng tròn
    //     // const circleRadius = Math.min(imageToCrop.width, imageToCrop.height) / 4; // Bán kính vòng tròn
    //     // const centerX = imageToCrop.width / 2;
    //     // const centerY = imageToCrop.height / 2;

    //     // cropContext.beginPath();
    //     // cropContext.arc(centerX, centerY, circleRadius, 0, Math.PI * 2);
    //     // cropContext.strokeStyle = 'red';
    //     // cropContext.lineWidth = 2;
    //     // cropContext.stroke();
    //     // cropContext.closePath();
    // }

    // img.onload = () => {
    //     imageToCrop.width = img.width;
    //     imageToCrop.height = img.height;
    //     cropContext.drawImage(img, offsetX, offsetY, cropCanvas.width, cropCanvas.height);
    //     cropBox.style.display = 'block';
    // };

    // Kéo ảnh

    imgTranslate.addEventListener('mousedown', (e) => {
        isDragging = true;
        imgTranslate.style.cursor = 'grabbing';
        startX = e.clientX;
        startY = e.clientY;
    });

    document.addEventListener('mousemove', (e) => {
        if (isDragging) {
            const deltaX = e.clientX - startX;
            const deltaY = e.clientY - startY;

            const maxX = imgTranslate.getBoundingClientRect().width / 2 - 200;

            imageX += deltaX;
            imageY += deltaY;

            // Thu nhỏ hình ảnh
            if (imageX >= -maxX && imageX <= maxX) {
                imgTranslate.style.transform = `translate3d(${imageX}px, -${0}px, 0px) scale(${heightScale})`;
                imgTranslate2.style.transform = `translate3d(${imageX}px, -${0}px, 0px) scale(${heightScale})`;
            } else if (imageX > 0) {
                imageX = maxX;

            } else {
                imageX = -maxX;
            }

            // Cập nhật điểm bắt đầu cho lần di chuyển tiếp theo
            startX = e.clientX;
            startY = e.clientY;
        }
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            imgTranslate.style.cursor = "grab";
        }
    });

    document.addEventListener('mouseleave', () => {
        isDragging = false;
        imgTranslate.style.cursor = 'grab';
    });

    // Xử lý khi nhấn nút cắt
    cropBtnSave.addEventListener("click", () => {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        const size = 400; // Kích thước của hình ảnh và div

        // Thiết lập kích thước canvas bằng kích thước của div
        var cropX = 0;
        var cropY = 0;
        var cropWidth = imageToCrop.naturalWidth * 0.5;
        var cropHeight = imageToCrop.naturalHeight * 0.5;

        //resize our canvas to match the size of the cropped area
        canvas.width = cropWidth;
        canvas.height = cropHeight;

        // Vẽ một hình tròn lên canvas để cắt ảnh
        ctx.beginPath();
        ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, 0, 2 * Math.PI);
        ctx.clip(); // Chỉ vẽ vào khu vực hình tròn

        // Vẽ hình ảnh lên canvas
        ctx.drawImage(imageToCrop, cropX, cropY, cropWidth, cropHeight, 0, 0, canvas.width, canvas.height);

        // Chuyển canvas thành dữ liệu URL (Base64)
        const dataUrl = canvas.toDataURL('image/png');

        // Tạo một liên kết để tải ảnh về
        const link = document.createElement('a');
        link.href = dataUrl;
        link.download = 'cropped_image.png';
        link.click();
    });

    // Xử lý nút cancel
    cropBtnCancel.addEventListener('click', () => {
        cropBox.style.display = "none";
        imageToCrop.value = "";
        imageToCrop.removeAttribute('src');
    });

    // Xử lý nút đóng
    cropBtnClose.addEventListener('click', () => {
        cropBox.style.display = "none";
        imageToCrop.value = "";
        imageToCrop.removeAttribute('src');
    });
});
