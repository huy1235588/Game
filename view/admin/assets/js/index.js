/*******************************************
 * 
 *          Search input
 * 
 *******************************************/
const searchClear = document.querySelector('.search-clear');
const inputSearch = document.querySelector('.input-search');


inputSearch.addEventListener('input', (e) => {
    searchClear.style.display = "flex";

    searchClear.addEventListener('click', () => {
        inputSearch.value = "";
        inputSearch.focus();
        searchClear.style.display = "none";
    });
});

/*******************************************
 * 
 *          Tooltip
 * 
 *******************************************/
// Get all elements with data-toggle="tooltip"
const tooltipElements = document.querySelectorAll('[data-toggle="tooltip"]');

// Hàm tạo tooltip element
function createTooltip(text, dataPlacement, x, y) {
    const tooltip = document.createElement('div');
    tooltip.classList.add("tooltip");

    const arrow = document.createElement('p');
    arrow.classList.add('tooltip-arrow');
    const inner = document.createElement('p');
    inner.classList.add('tooltip-inner');
    inner.textContent = text;

    tooltip.appendChild(arrow);
    tooltip.appendChild(inner);

    // Set vị trí tooltip
    tooltip.style.left = `${x + 5}px`;
    tooltip.style.top = `${y}px`;
    document.body.appendChild(tooltip);

    // Thêm class arrow
    tooltip.classList.add(`bs-tooltip-${dataPlacement}`);
    arrow.style.top = `${inner.offsetHeight / 2 - arrow.offsetHeight / 2}px`;

    return tooltip;
}

tooltipElements.forEach(element => {
    let tooltip;

    // Show tooltip khi mouseover
    element.addEventListener('mouseover', (event) => {
        // Set văn bản tooltip từ data-original-title
        const title = element.getAttribute('data-original-title');
        const rect = element.getBoundingClientRect();
        const dataPlacement = element.getAttribute("data-placement");

        tooltip = createTooltip(title, dataPlacement, rect.right, rect.top);
    });

    // Remove tooltip khi mouseout
    element.addEventListener('mouseout', () => {
        if (tooltip) {
            tooltip.remove();
            tooltip = null;
        }
    });
});

/*******************************************
 * 
 *          Sidebar
 * 
 *******************************************/
const body = document.getElementsByTagName('body')[0],
    isMini = window.localStorage.getItem('hs-navbar-vertical-aside-mini') === null ? false : window.localStorage.getItem('hs-navbar-vertical-aside-mini');

if (isMini) {
    body.classList.add('navbar-vertical-aside-mini-mode')
}

// Thu nhỏ aside
var btnCollapse = document.querySelector('.toggle-vertical-aside');
btnCollapse.addEventListener('click', () => {
    if (body.classList.contains('navbar-vertical-aside-mini-mode')) {
        body.classList.remove('navbar-vertical-aside-mini-mode');
    } else {
        body.classList.add('navbar-vertical-aside-mini-mode');
    }
});


// Kiểm tra nếu có thanh scrollbar trong sidebar-content
$(function () {
    const sidebarContent = $('.sidebar-content');
    const sidebarList = document.querySelector('.sidebar-list');

    function updateSidebarWidth() {
        if (sidebarContent.hasScrollBar()) {
            sidebarList.style.width = 'initial';
        } else {
            sidebarList.style.width = "calc(100% - 0.6125rem)";
        }
    }

    updateSidebarWidth();

    $(window).on('click', updateSidebarWidth);

});

(function ($) {
    $.fn.hasScrollBar = function () {
        return this.get(0).scrollHeight > this.get(0).clientHeight;
    }
})(jQuery);


/*******************************************
 * 
 *          Sidebar Submenu
 * 
 *******************************************/
function toggleSidebarSubMenu(elements) {
    elements.forEach(element => {
        element.addEventListener('click', () => {
            const submenu = element.nextElementSibling;

            if (element.classList.contains("active")) {
                element.classList.remove("active");
            }

            else {
                // Loại bỏ lớp 'active' và ẩn tất cả các submenu
                elements.forEach(el => {
                    el.classList.remove("active");
                });
                // Thêm lớp 'active' vào element hiện tại và hiển thị submenu của nó
                element.classList.add("active");
            }
        });
    });
}

// Submenu level 1
const sidebarItemHasMenu = document.querySelectorAll('.sidebar-item-has-menu > .sidebar-link');
toggleSidebarSubMenu(sidebarItemHasMenu);

// Submenu level 2
const sidebarSubMenuLink = document.querySelectorAll('.sidebar-item-has-menu > .nav > .sidebar-submenu-item-has-menu > .sidebar-link');
toggleSidebarSubMenu(sidebarSubMenuLink);

// Submenu level 3
const sidebarSubMenuLink3 = document.querySelectorAll('.sidebar-item-has-menu > .nav .nav .sidebar-submenu-item-has-menu > .sidebar-link');
toggleSidebarSubMenu(sidebarSubMenuLink3);

$(document).ready(function () {
    // Gán class 'show' cho submenu đầu tiên khi trang tải (tùy chọn)
    $('.sidebar-submenu-list').first().addClass('show').slideDown(0);
    
    // Event click để toggle các submenu
    $('.sidebar-link').on('click', function (e) {
        const $submenuList = $(e.currentTarget).siblings('.sidebar-submenu-list');

        if ($submenuList.hasClass('show')) {
            // Nếu submenu đang có class 'show', thực hiện đóng nó
            $submenuList.slideUp(200, function () {
                $submenuList.removeClass('show'); // Xóa class 'show' khi đóng
            });
        } else {
            // Nếu submenu không có class 'show', mở nó và thêm class 'show'
            $submenuList.addClass('show').slideDown(200);
        }

        // Đóng tất cả các submenu khác khi một submenu được mở
        $('.sidebar-submenu-list').not($submenuList).slideUp(200, function () {
            $(this).removeClass('show'); // Xóa class 'show' cho các submenu khác
        });
    });
});