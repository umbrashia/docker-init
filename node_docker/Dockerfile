FROM node:12

WORKDIR /usr/src/app

COPY code/ .

RUN npm install --no-optional && npm cache clean --force

EXPOSE 8080

CMD [ "npm", "start" ]