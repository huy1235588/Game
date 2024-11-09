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
*          Sidebar Submenu
* 
*******************************************/
function toggleSidebarSubMenu(element, sidebarLink, e) {
    // Xóa toàn bộ lớp 'active' ngoài element đang nhấn
    $(sidebarLink).not($(e.currentTarget)).removeClass("active");

    // Xóa lớp 'active'
    if (element.classList.contains("active")) {
        element.classList.remove("active");
    }

    // Thêm lớp 'active'
    else {
        element.classList.add("active");
    }
}

$(document).ready(function () {
    // Gán class 'show' cho submenu đầu tiên khi trang tải (tùy chọn)
    $('.sidebar-submenu-list.show').slideDown(0);

    // Event click để toggle các submenu
    $('.sidebar-link').on('click', function (e) {
        // Submenu level 3
        if ($(this).parent().parent().parent().hasClass("sidebar-submenu-item-has-menu")) {
            if ($(e.currentTarget).siblings('.sidebar-submenu-list').hasClass('show')) {
                // Nếu submenu đang có class 'show', thực hiện đóng nó
                $(e.currentTarget).siblings('.sidebar-submenu-list').slideUp(200, function () {
                    $(e.currentTarget).siblings('.sidebar-submenu-list').removeClass('show'); // Xóa class 'show' khi đóng
                });
            } else {
                // Nếu submenu không có class 'show', mở nó và thêm class 'show'
                $(e.currentTarget).siblings('.sidebar-submenu-list').addClass('show').slideDown(200);
            }

            // Đóng tất cả các submenu khác khi một submenu được mở
            $(".sidebar-submenu-list.show > .sidebar-submenu-item-has-menu .sidebar-submenu-list .sidebar-submenu-item-has-menu .sidebar-submenu-list").not($(e.currentTarget).siblings('.sidebar-submenu-list')).slideUp(200, function () {
                $(this).removeClass('show'); // Xóa class 'show' cho các submenu khác
            });

            toggleSidebarSubMenu($(this)[0], ".sidebar-item-has-menu > .sidebar-submenu-list > .sidebar-submenu-item-has-menu > .sidebar-submenu-list > .sidebar-submenu-item-has-menu > .sidebar-submenu-item-link", e);
        }

        // Submenu level 2
        else if ($(this).parent().hasClass("sidebar-submenu-item-has-menu")) {
            if ($(e.currentTarget).siblings('.sidebar-submenu-list').hasClass('show')) {
                // Nếu submenu đang có class 'show', thực hiện đóng nó
                $(e.currentTarget).siblings('.sidebar-submenu-list').slideUp(200, function () {
                    $(e.currentTarget).siblings('.sidebar-submenu-list').removeClass('show'); // Xóa class 'show' khi đóng
                });
            } else {
                // Nếu submenu không có class 'show', mở nó và thêm class 'show'
                $(e.currentTarget).siblings('.sidebar-submenu-list').addClass('show').slideDown(200);
            }

            // Đóng tất cả các submenu khác khi một submenu được mở
            $(".sidebar-submenu-list.show > .sidebar-submenu-item-has-menu .sidebar-submenu-list").not($(e.currentTarget).siblings('.sidebar-submenu-list')).slideUp(200, function () {
                $(this).removeClass('show'); // Xóa class 'show' cho các submenu khác
            });

            toggleSidebarSubMenu($(this)[0], ".sidebar-item-has-menu > .sidebar-submenu-list > .sidebar-submenu-item-has-menu > .sidebar-submenu-item-link", e);
        }

        // Submenu level 1
        else {
            if ($(e.currentTarget).siblings('.sidebar-submenu-list').hasClass('show')) {
                // Nếu submenu đang có class 'show', thực hiện đóng nó
                $(e.currentTarget).siblings('.sidebar-submenu-list').slideUp(200, function () {
                    $(e.currentTarget).siblings('.sidebar-submenu-list').removeClass('show'); // Xóa class 'show' khi đóng
                });
            } else {
                // Nếu submenu không có class 'show', mở nó và thêm class 'show'
                $(e.currentTarget).siblings('.sidebar-submenu-list').addClass('show').slideDown(200);
            }

            // Đóng tất cả các submenu khác khi một submenu được mở
            $('.sidebar-submenu-list').not($(e.currentTarget).siblings('.sidebar-submenu-list')).slideUp(200, function () {
                $(this).removeClass('show'); // Xóa class 'show' cho các submenu khác
            });

            toggleSidebarSubMenu($(this)[0], ".sidebar-item-link", e);
        }
    });
});

/*******************************************
* 
*          Toggle aside
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
        document.querySelector(".sidebar-item-has-menu > .sidebar-submenu-list.show").style.display = "block";
        if (document.querySelector(".sidebar-list > .sidebar-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show")) {
            document.querySelector(".sidebar-list > .sidebar-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show").style.display = "block";
        }
        if (document.querySelector(".sidebar-list > .sidebar-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show")) {
            document.querySelector(".sidebar-list > .sidebar-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show > .sidebar-submenu-item-has-menu > .sidebar-submenu-list.show").style.display = "block";
        }

        document.querySelectorAll(".nav-tabs > li").forEach(element => {
            element.firstElementChild.style.pointerEvents = "auto";
        });

    } else {
        body.classList.add('navbar-vertical-aside-mini-mode');

        document.querySelector(".sidebar-list").style.width = "100%";

        document.querySelectorAll(".sidebar-submenu-list").forEach(element => {
            element.style.display = "none";
        });

        document.querySelectorAll(".nav-tabs > li").forEach(element => {
            element.firstElementChild.style.pointerEvents = "none";
            element.style.cursor = "pointer";
        });

    }
});