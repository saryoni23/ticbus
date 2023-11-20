/** @type {import('tailwindcss').Config} */
export default {
  content: [ 
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js"
],safelist: [
  'w-64',
  'w-1/2',
  'rounded-l-lg',
  'rounded-r-lg',
  'bg-gray-200',
  'grid-cols-4',
  'grid-cols-7',
  'h-6',
  'leading-6',
  'h-9',
  'leading-9',
  'shadow-lg',
  'bg-opacity-50',
  'dark:bg-opacity-80'
],
darkMode: "class",
theme: {
  extend: {
    aria: {
      asc: 'sort="ascending"',
      desc: 'sort="descending"',
    },
    colors: {
      primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a" }
    },
    fontFamily: {
      'sans': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
      'body': ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'system-ui', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
      'mono': ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'Liberation Mono', 'Courier New', 'monospace']
    },
    transitionProperty: {
      'width': 'width'
    },
    textDecoration: ['active'],
    minWidth: {
      'kanban': '28rem'
    },
  },
  container: {
    center: true,
    padding: '1.5rem',},
  extend: {
    colors:{
      biru:'#1E429F',
      merahgelap:'#99154B',
      hijaugelap:'#03543F',
      abutua: '#3A405A',
      abumuda: '#AEC5EB',
      coklatsusu: '#F9DEC9',
      coklatmuda: '#E9AFA3',
      coklat: '#685044',
    },
   
  },
  fontFamily: {
    sans: ['Graphik', 'sans-serif'],
    serif: ['Merriweather', 'serif'],
  },
},
  plugins: [
    require('flowbite/plugin'),
    require('@tailwindcss/forms'),
    require("tw-elements/dist/plugin.cjs"),({

      charts: true,
      forms: true,
      tooltips: true,
      strategy: 'base', // only generate global styles
      strategy: 'class', // only generate classes

  }),
  ],
}


