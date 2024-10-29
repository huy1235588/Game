/*******************************************
 * 
 *          Chọn hình ảnh
 * 
 *******************************************/
// Lấy tất cả phần tử 
const imgItems = document.querySelectorAll('.product-img-item');
const imgStripItem = document.querySelector('.product-img-strip-item');
const imgStripItems = document.querySelectorAll('.product-img-strip-item');
const imgStripItemSelector = document.querySelector('.product-img-strip-item-selector')

const sliderLeftBtn = document.querySelector(".slider-left");
const sliderRightBtn = document.querySelector(".slider-Right");

let currentIndex = 0; // Bắt đầu từ hình ảnh đầu tiên

// Hàm để hiện thị hình ảnh tương ứng
function showImage(index) {
    // Loại bỏ lớp active từ tất cả các hình ảnh
    imgItems.forEach(img => img.classList.remove('active'));

    currentIndex = index;

    // Thêm lớp active vào hình ảnh được chọn
    imgItems[index].classList.add('active');

    const currentItem = imgStripItems[currentIndex];

    // Vị trí cuộn đến item
    let targetScrollLeft = currentItem.offsetLeft;

    // Kiểm tra xem item có bị che không 
    if (isChildHiddenHorizontally(currentItem)) {
        // Nếu item cuối cùng vượt ra ngoài khung nhìn của cha
        const maxScrollLeft = productImgStrip.scrollWidth - productImgStrip.clientWidth;
        targetScrollLeft = Math.min(targetScrollLeft, maxScrollLeft);

        // Cuộn đến item
        productImgStrip.style.right = targetScrollLeft;

        // Cập nhật vị trí handle
        let handlePosition = (targetScrollLeft / (productImgStrip.scrollWidth - productImgStrip.clientWidth)) * (slider.clientWidth - handleWidth);
        handlePosition = Math.max(0, Math.min(handlePosition, slider.clientWidth - handleWidth));
        sliderHandle.style.left = `${handlePosition}px`;
    }
}

// Lặp qua toàn bộ strip và gán sự kiện click
imgStripItems.forEach((stripItem, index) => {
    stripItem.addEventListener('click', () => {
        showImage(index);

        // Vị trí cuộn đến item
        let targetScrollLeft = stripItem.offsetLeft;

        // Thay đổi vị trí selector
        imgStripItemSelector.style.left = targetScrollLeft;

        // Kiểm tra xem item có bị che không 
        if (isChildHiddenHorizontally(stripItem)) {
            // Nếu item cuối cùng vượt ra ngoài khung nhìn của cha
            const maxScrollLeft = productImgStrip.scrollWidth - productImgStrip.clientWidth;
            targetScrollLeft = Math.min(targetScrollLeft, maxScrollLeft);

            // Cuộn đến item
            productImgStrip.style.right = targetScrollLeft;

            // Cập nhật vị trí handle
            let handlePosition = (targetScrollLeft / (productImgStrip.scrollWidth - productImgStrip.clientWidth)) * (slider.clientWidth - handleWidth);
            handlePosition = Math.max(0, Math.min(handlePosition, slider.clientWidth - handleWidth));
            sliderHandle.style.left = `${handlePosition}px`;
        }
    });
});

// Nút "Phải" để chuyển đến hình ảnh kế tiếp
sliderRightBtn.addEventListener('click', () => {
    if (currentIndex < imgStripItems.length - 1) {
        showImage(currentIndex + 1);

        // Vị trí cuộn đến item
        let targetScrollLeft = imgStripItems[currentIndex].offsetLeft;

        // Thay đổi vị trí selector
        imgStripItemSelector.style.left = targetScrollLeft;
    }
    else if (currentIndex === imgStripItems.length - 1) {
        currentIndex = 0;
        showImage(currentIndex);

        // Vị trí cuộn đến item
        let targetScrollLeft = imgStripItems[currentIndex].offsetLeft;

        // Thay đổi vị trí selector
        imgStripItemSelector.style.left = targetScrollLeft;
    }
});

// Nút "Trái" để chuyển đến hình ảnh trước đó
sliderLeftBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        showImage(currentIndex - 1);

        // Vị trí cuộn đến item
        let targetScrollLeft = imgStripItems[currentIndex].offsetLeft;

        // Thay đổi vị trí selector
        imgStripItemSelector.style.left = targetScrollLeft;
    }
    else if (currentIndex === 0) {
        currentIndex = imgStripItems.length - 1;
        showImage(currentIndex);

        // Vị trí cuộn đến item
        let targetScrollLeft = imgStripItems[currentIndex].offsetLeft;

        // Thay đổi vị trí selector
        imgStripItemSelector.style.left = targetScrollLeft;
    }
});

// Hiển thị ảnh đầu tiên
showImage(currentIndex);

/*******************************************
 * 
 *          Slider
 * 
 *******************************************/
const slider = document.querySelector('.slider');
const sliderHandle = document.querySelector('.slider-handle');
const productImgStrip = document.querySelector('.product-img-strip');

// Tính toán chiều rộng của handle
const handleWidth = slider.clientWidth / imgStripItems.length + 30;
sliderHandle.style.width = `${handleWidth}px`;

// Biến lưu trạng thái kéo và offset
let isDragging = false;
let offsetX = 0; // Biến lưu vị trí offset

// Sự kiện bắt đầu kéo
sliderHandle.addEventListener('mousedown', (e) => {
    isDragging = true;
    offsetX = e.clientX - sliderHandle.getBoundingClientRect().left; // Tính toán offset

    // Xóa hiệu ứng transition khi bắt đầu kéo
    productImgStrip.style.transition = 'none';
    sliderHandle.style.transition = 'none';

    e.preventDefault();
});

document.addEventListener('mousemove', (e) => {
    if (!isDragging) return;

    const sliderRect = slider.getBoundingClientRect();
    let newX = e.clientX - sliderRect.left - offsetX; // Cập nhật vị trí dựa trên offset

    // Đảm bảo handle nằm trong giới hạn của slider
    newX = Math.max(0, Math.min(newX, slider.clientWidth - handleWidth));

    sliderHandle.style.left = `${newX}px`;

    // Tính toán vị trí cuộn của product-img-strip dựa vào vị trí của handle
    const scrollPercentage = newX / (slider.clientWidth - handleWidth);
    const maxScroll = productImgStrip.scrollWidth - productImgStrip.clientWidth;

    productImgStrip.style.right = scrollPercentage * maxScroll;
});

// Kết thúc kéo
document.addEventListener('mouseup', () => {
    isDragging = false;

    // Khôi phục transition khi kết thúc kéo
    productImgStrip.style.transition = 'right 0.5s ease-in-out';
    sliderHandle.style.transition = 'left 0.5s ease-in-out';
});

// Hàm kiểm tra phần tử có bị che bởi overflow
function isChildHiddenHorizontally(childElement) {
    const parentElement = childElement.parentElement.parentElement;

    const childRect = childElement.getBoundingClientRect();
    const parentRect = parentElement.getBoundingClientRect();

    const isHiddenLeft = childRect.left < parentRect.left;
    const isHiddenRight = childRect.right > parentRect.right;

    return isHiddenLeft || isHiddenRight;
}
/*******************************************
 * 
 *          Xem thêm
 * 
 *******************************************/
const readMoreBtn = document.querySelector('.description-read-more');
const descriptionFade = document.querySelector('.description-fade');
const descriptionArena = document.querySelector('.description-arena');

readMoreBtn.addEventListener('click', () => {
    descriptionArena.style.overflow = "visible";
    descriptionArena.style.maxHeight = "none";
    descriptionFade.style.display = "none";
});

