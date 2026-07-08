/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './app/View/Components/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0F3B79',
        'primary-hover': '#0a2752',
        'primary-soft': '#ebf4ff',
        'primary-darker': '#0f2d6b',
        'primary-card': '#163070',
        surface: '#ffffff',
        'surface-2': '#f5f7fa',
        border: '#e2e8f0',
        text: '#1a202c',
        'text-muted': '#4a5568',
        'text-subtle': '#718096',
        success: '#16a34a',
        'success-hover': '#15803d',
        'success-soft': '#c6f6d5',
        warning: '#f9a825',
        'warning-hover': '#d68f1c',
        'warning-soft': '#fbd38d',
        danger: '#dc2626',
        'danger-hover': '#b91c1c',
        'danger-soft': '#fed7d7',
        info: '#2563eb',
        'info-hover': '#1c4bd6',
        'info-soft': '#bee3f8',
      },
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        outfit: ['Outfit', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      borderRadius: {
        card: '0.75rem',
        btn: '0.5rem',
      },
      boxShadow: {
        card: '0 2px 10px rgba(0, 0, 0, 0.05)',
        'card-hover': '0 10px 25px rgba(0, 0, 0, 0.1)',
        step: '0 4px 14px rgba(28, 57, 142, 0.15)',
      },
    },
  },
  plugins: [],
}
