// Navigation toggle
window.addEventListener('load', function () {
      const menuContainer = document.querySelector('#primary-menu');
      const menuToggle = document.getElementById("primary-menu-toggle");

      // Toggle the main menu
      menuToggle?.addEventListener("click", function (e) {
          e.preventDefault();
          menuContainer.classList.toggle("hidden");
      });

      // Add toggle behavior for submenu parents on mobile
      const submenuParents = document.querySelectorAll("#primary-menu .menu-item-has-children > a");
  
      submenuParents.forEach(parentLink => {
          const parentItem = parentLink.parentElement;
          const submenu = parentItem.querySelector("ul");
  
          // Create a toggle button
          const toggleBtn = document.createElement("button");
          toggleBtn.setAttribute("aria-label", "Toggle submenu");
          toggleBtn.innerHTML = "<fa class='fas fa-chevron-down'></fa>";
          toggleBtn.className = "ml-2 cursor-pointer";
  
          // Insert toggle after the link
          parentLink.after(toggleBtn);
  
          toggleBtn.addEventListener("click", function (e) {
              e.preventDefault();
              submenu.classList.toggle("hidden");
          });
  
          parentLink.addEventListener("click", function (e) {
              e.preventDefault();
              submenu.classList.toggle("hidden");
          });
      });
});
