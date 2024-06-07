import { db } from '@/server/fake-db/pages/help-center'

export default defineEventHandler(async event => {
  setResponseStatus(event, 200)
  
  return db.articleData
})
