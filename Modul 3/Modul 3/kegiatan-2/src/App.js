import React, { useState } from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Navbar from "./components/Navbar";
import Hero from "./components/Hero";
import Footer from "./components/Footer";
import Menu from "./pages/Menu";
import AboutUs from "./pages/AboutUs";
import Contact from "./pages/Contact";

function App() {
  const [activePage, setActivePage] = useState(""); // State untuk melacak halaman aktif

  return (
    <Router>
      <div>
        <Navbar setActivePage={setActivePage} />
        <Hero />
        <Routes>
          <Route path="/" element={activePage === "menu" ? <Menu /> : null} />
          <Route
            path="/about"
            element={activePage === "about" ? <AboutUs /> : null}
          />
          <Route
            path="/contact"
            element={activePage === "contact" ? <Contact /> : null}
          />
        </Routes>
        <Footer />
      </div>
    </Router>
  );
}

export default App;
