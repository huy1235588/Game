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
