document.addEventListener("DOMContentLoaded", function () {
  // Fade-in animation
  const fadeEls = document.querySelectorAll(".fade-in");

  function handleScroll() {
    fadeEls.forEach((el) => {
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 50) {
        el.classList.add("show");
      }
    });
  }

  window.addEventListener("scroll", handleScroll);
  handleScroll(); // run on load
});

// Projects Data
const projects = [
  {
    id: "project1",
    title: "Tokyo Table",
    img: "/Portfolio_OJT_PHP/img/tokyotable.png",
    desc: "A MEVN Project that is created for a sample business.",
    timespan: "1 month",
    languages: "HTML, CSS, JS",
    tools: "Express.Js, Vue.JS, Node.js, MongoDB, Figma, Canva",
    role: "Fullstack Developer"
  },
  {
    id: "project2",
    title: "Business Website Prototype",
    img: "/Portfolio_OJT_PHP/img/jng.png",
    desc: "A prototype for a website that is made for our business.",
    timespan: "2 Days",
    languages: "None",
    tools: "Canva",
    role: "UI/UX"
  },
  {
    id: "project3",
    title: "Library Management System Prototype",
    img: "/Portfolio_OJT_PHP/img/tokyotable.png",
    desc: "A project aimed at enhancing book cataloging and lending processes.",
    timespan: "2 months",
    languages: "HTML, CSS, JS",
    tools: "Figma, Canva",
    role: "Frontend/UI/UX"
  },
  {
    id: "project4",
    title: "Logo",
    img: "/Portfolio_OJT_PHP/img/logo.png",
    desc: "A graphic design/sticker for our business.",
    timespan: "1 day",
    languages: "None",
    tools: "Canva",
    role: "UI/UX"
  },
  {
    id: "project5",
    title: "Business Cards",
    img: "/Portfolio_OJT_PHP/img/businesscard.png",
    desc: "A business card that I created for our business.",
    timespan: "1 day",
    languages: "None",
    tools: "Canva",
    role: "UI/UX"
  },
  {
    id: "project6",
    title: "Tailwind Gallery Project",
    img: "/Portfolio_OJT_PHP/img/tailwind.png",
    desc: "A Angular gallery website that uses tailwind for design.",
    timespan: "3 days",
    languages: "HTML, CSS, JS",
    tools: "Figma, Canva, Angular",
    role: "Frontend/UI/UX"
  },
];

// Cards and Modals
const cardContainer = document.getElementById("projectCards");

if (cardContainer) {
  projects.forEach((project) => {
    const cardCol = document.createElement("div");
    cardCol.className = "col-lg-4 col-md-6 mb-4";
    cardCol.innerHTML = `
      <div class="card fade-in" data-bs-toggle="modal" data-bs-target="#${project.id}Modal" style="cursor:pointer;">
        <div class="bg-image hover-overlay shadow-lg">
          <img src="${project.img}" class="img-fluid" />
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">${project.title}</h5>
          <p class="card-text">${project.desc}</p>
        </div>
      </div>
    `;
    cardContainer.appendChild(cardCol);

    const modal = document.createElement("div");
    modal.className = "modal fade";
    modal.id = `${project.id}Modal`;
    modal.tabIndex = -1;
    modal.setAttribute("aria-labelledby", `${project.id}ModalLabel`);
    modal.setAttribute("aria-hidden", "true");

    modal.innerHTML = `
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0 rounded-4">
          <div class="modal-header bg-dark text-white text-center border-0 rounded-top-4">
            <h5 class="modal-title w-100 fw-bold" id="${project.id}ModalLabel">${project.title}</h5>
            <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center px-4 py-4">
            <img src="${project.img}" alt="${project.title}" class="img-fluid rounded shadow mb-4" style="max-height: 300px; object-fit: cover;" />
            <p class="fs-5 text-muted">${project.desc}</p>
          </div>
          <div class="text-center row text-start fs-6">
            <div class="col-md-6 mb-3"><strong>Time Span:</strong><br><span>${project.timespan}</span></div>
            <div class="col-md-6 mb-3"><strong>Languages Used:</strong><br><span>${project.languages}</span></div>
            <div class="col-md-6 mb-3"><strong>Tools/Frameworks:</strong><br><span>${project.tools}</span></div>
            <div class="col-md-6 mb-3"><strong>Role/Contribution:</strong><br><span>${project.role}</span></div>
          </div>
        </div>
      </div>
    `;
    document.body.appendChild(modal);
  });
}