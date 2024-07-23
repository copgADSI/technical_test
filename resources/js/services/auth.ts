import axios from "axios"
import { User } from "../interfaces/user"

async function register(user: User) : Promise<void>
{
    try {
        const { data } = await axios.post('/auth/register', user)
        return data

    } catch (error) {
        console.error(error)
    }
}


async function verifyEmail(code: string) : Promise<void>{
    try {
        const { data } = await axios.post('/auth/verify-email', { code })
        return data
    } catch (error) {
        console.error(error)
    }
}

const AuthService = {
    register,
    verifyEmail
}

export default AuthService
