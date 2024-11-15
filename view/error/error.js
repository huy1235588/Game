const eyeRef1 = document.querySelector('.eyeRef1');
const eyeRef2 = document.querySelector('.eyeRef2');

// Hàm xử lý chuyển động của mắt
const handleMouseMove = (event) => {
    const moveEye = (eye) => {
        // Tính toán vị trí tâm của mắt
        const x = eye.offsetLeft + (eye.offsetWidth / 2);
        const y = eye.offsetTop + (eye.offsetHeight / 2);

        // Tính góc quay giữa chuột và tâm của mắt
        const rad = Math.atan2(event.pageX - x, event.pageY - y);
        const rot = (rad * (180 / Math.PI) * -1) + 180;

        // Áp dụng góc quay cho mắt
        eye.style.transform = `rotate(${rot}deg)`;
    };

    // Di chuyển cả hai mắt nếu chúng tồn tại
    if (eyeRef1 && eyeRef2) {
        moveEye(eyeRef1);
        moveEye(eyeRef2);
    }
};

// Thêm sự kiện di chuyển chuột vào body
document.body.addEventListener('mousemove', handleMouseMove);
