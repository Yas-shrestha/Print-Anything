# Custom Clothes Designer

A web application that allows users to create **custom printed clothing designs** by placing images on predefined clothing templates. Users can upload graphics, position them on the garment, resize them, and save the design configuration.

The application stores **design layout data using JSON**, making it easy to reproduce or edit designs later.

---

# Features

## Interactive Clothing Design

Users can place custom images on clothing templates such as:

- T-shirts
- Hoodies
- Sweatshirts
- Other printable garments

Images can be:

- Dragged
- Resized
- Positioned anywhere on the garment

---

## JSON-Based Design Mapping

Each design is saved as a **JSON object** that stores:

- Image file reference
- Position coordinates
- Width and height
- Rotation (optional)
- Relative scaling

This makes the system **lightweight and portable**.
