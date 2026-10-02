# Stanley Tech Connect - Design System

## 🎨 Color Palette

### Primary Colors
| Color | Hex | Usage |
|-------|-----|-------|
| Primary | #00d2ff | Main brand color, buttons, links |
| Primary Dark | #00b8d4 | Hover states |
| Primary Light | #4ddfff | Light backgrounds |
| Secondary | #3a7bd5 | Secondary elements |

### Neutral Colors
| Color | Hex | Usage |
|-------|-----|-------|
| Dark | #1a1a2e | Headers, footers, text |
| Dark Light | #16213e | Dark backgrounds |
| White | #ffffff | Cards, backgrounds |
| Light | #f8f9fa | Page background |
| Light Gray | #f0f4f8 | Section backgrounds |
| Gray | #6c757d | Body text |
| Gray Light | #e9ecef | Borders, inputs |

### Status Colors
| Color | Hex | Usage |
|-------|-----|-------|
| Success | #2ecc71 | Success messages, validations |
| Danger | #e74c3c | Errors, delete actions |
| Warning | #ffc107 | Warnings, alerts |

---

## 📝 Typography

### Font Family


### Font Sizes
| Name | Size | Usage |
|------|------|-------|
| 5xl | 3rem (48px) | Large hero headings |
| 4xl | 2.5rem (40px) | Main hero headings |
| 3xl | 2rem (32px) | Section titles |
| 2xl | 1.6rem (25.6px) | Sub headings |
| xl | 1.3rem (20.8px) | Card headings |
| lg | 1.15rem (18.4px) | Sub titles |
| base | 0.95rem (15.2px) | Body text |
| sm | 0.8rem (12.8px) | Small text |
| xs | 0.7rem (11.2px) | Labels, badges |

### Font Weights
| Name | Weight | Usage |
|------|--------|-------|
| Light | 300 | Light text |
| Normal | 400 | Body text |
| Medium | 500 | Sub headings |
| Semibold | 600 | Labels, buttons |
| Bold | 700 | Headings |
| Extrabold | 800 | Hero headings |

---

## 📐 Spacing System (8px Grid)

| Token | Rem | Pixels | Usage |
|-------|-----|--------|-------|
| spacing-0 | 0 | 0 | No spacing |
| spacing-1 | 0.25rem | 4px | Tight spacing |
| spacing-2 | 0.5rem | 8px | Small gaps |
| spacing-3 | 0.75rem | 12px | Icon spacing |
| spacing-4 | 1rem | 16px | Default gap |
| spacing-5 | 1.25rem | 20px | Card padding |
| spacing-6 | 1.5rem | 24px | Section gaps |
| spacing-8 | 2rem | 32px | Large gaps |
| spacing-10 | 2.5rem | 40px | Section padding |
| spacing-12 | 3rem | 48px | Big spacing |
| spacing-16 | 4rem | 64px | Section top |
| spacing-20 | 5rem | 80px | Large section |
| spacing-24 | 6rem | 96px | Hero padding |

---

## 🔲 Borders

| Name | Value | Usage |
|------|-------|-------|
| radius-sm | 4px | Small corners |
| radius-md | 8px | Default corners |
| radius-lg | 12px | Cards, containers |
| radius-xl | 16px | Large containers |
| radius-2xl | 20px | Big cards |
| radius-full | 9999px | Buttons, badges |

---

## 🌓 Shadows

| Name | Value | Usage |
|------|-------|-------|
| shadow-sm | 0 1px 2px rgba(0,0,0,0.05) | Subtle depth |
| shadow-md | 0 2px 8px rgba(0,0,0,0.08) | Cards |
| shadow-lg | 0 4px 20px rgba(0,0,0,0.12) | Hover states |
| shadow-xl | 0 8px 40px rgba(0,0,0,0.15) | Modals |
| shadow-2xl | 0 16px 60px rgba(0,0,0,0.18) | Hero images |

---

## 📱 Breakpoints

| Name | Min Width | Max Width | Columns |
|------|-----------|-----------|---------|
| Mobile | - | 480px | 1 column |
| Tablet | 481px | 768px | 2 columns |
| Desktop | 769px | 1024px | 3 columns |
| Large | 1025px | - | 4 columns |

---

## 🧩 Components

### Buttons
- **Primary**: `btn btn-primary`
- **Secondary**: `btn btn-secondary`
- **Success**: `btn btn-success`
- **Danger**: `btn btn-danger`
- **Warning**: `btn btn-warning`
- **Dark**: `btn btn-dark`
- **Outline**: `btn btn-outline`

### Sizes
- **Small**: `btn-sm`
- **Default**: (no modifier)
- **Large**: `btn-lg`
- **Block**: `btn-block`

### Cards
- **Default**: `.card`
- **Service**: `.service-card`
- **Course**: `.course-card`

### Forms
- **Container**: `.form-container`
- **Group**: `.form-group`
- **Input**: `input, textarea, select`
- **Error**: `.field-error`
- **Success**: `.field-success`
- **Help**: `.field-help`

---

## ✅ Accessibility Standards

- ✅ Contrast ratio: 4.5:1 minimum
- ✅ Focus indicators: `:focus-visible`
- ✅ Alt text on all images
- ✅ Semantic HTML
- ✅ ARIA labels where needed
- ✅ Reduced motion support
- ✅ Screen reader friendly

---

## 🎯 Best Practices

1. **Use CSS variables** for consistency
2. **Mobile-first** approach
3. **Semantic HTML** structure
4. **Accessible** by default
5. **Performant** animations
6. **Consistent** spacing
7. **Clear** visual hierarchy