FROM node:22-alpine AS build

WORKDIR /app
RUN yarn global add @nestjs/cli

COPY package.json yarn.lock ./

RUN yarn install --production

COPY . .

RUN yarn build

FROM node:22-alpine AS base

WORKDIR /app


COPY --from=build /app/dist ./dist
COPY --from=build /app/node_modules ./node_modules
COPY --from=build /app/package.json ./package.json

ENV NODE_ENV=production

USER node

CMD ["yarn", "run", "start:prod"]
