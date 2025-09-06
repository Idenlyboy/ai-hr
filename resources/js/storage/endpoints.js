export const endpoints = {
    auth: {
        loginPage: '/login/',
        registerPage: '/registration/',
        login: '/api/login/',
        logout: '/api/logout/',
        register: '/api/register/',
    },
    user: {
        crud: '/api/student/',
    },
    vacation: {
        edit: '/vacation/edit/',
        aiProcess: '/api/ai-process/vacation/',
        hunterApply: '/api/hunter-apply/',
    },
    resume: {
        edit: '/resume/edit',
        get: '/api/resume/get',
    },
    files: {
        store: '/api/files/',
        delete: '/api/files/destroy/',
    },
}