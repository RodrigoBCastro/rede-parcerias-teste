import type { Config } from 'tailwindcss'

const config: Config = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}

export default config
