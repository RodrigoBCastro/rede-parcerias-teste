export type UserRole = 'admin' | 'operator' | 'common'

export interface User {
    name: string
    email: string
    role: UserRole
    token: string
}
