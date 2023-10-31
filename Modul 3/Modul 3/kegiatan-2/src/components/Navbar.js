import React from "react";
import { Link } from "react-router-dom";

function Navbar({ setActivePage }) {
  const handleLinkClick = (page) => {
    setActivePage(page);
  };

  return (
    <nav>
      <h1>NAVBAR</h1>
      <ul>
        <li>
          <Link to="/" onClick={() => handleLinkClick("menu")}>
            Home
          </Link>
        </li>
        <li>
          <Link to="/about" onClick={() => handleLinkClick("about")}>
            About Us
          </Link>
        </li>
        <li>
          <Link to="/contact" onClick={() => handleLinkClick("contact")}>
            Contact
          </Link>
        </li>
      </ul>
    </nav>
  );
}

export default Navbar;
