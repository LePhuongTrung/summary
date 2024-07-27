import { ValidationPipe } from '@nestjs/common';
import { NestFactory } from '@nestjs/core';
import { DocumentBuilder, SwaggerModule } from '@nestjs/swagger';
import * as dotenv from 'dotenv';
import { i18nValidationErrorFactory } from 'nestjs-i18n';
dotenv.config();

import { HttpExceptionFilter } from './common/exception-filters/http-exception.filter';
import { AppModule } from './modules/app/app.module';

async function bootstrap() {
  const app = await NestFactory.create(AppModule, { bufferLogs: true });
  const port = process.env.PORT || 3000;

  const config = new DocumentBuilder()
    .setTitle('mobile-nest')
    .setVersion('1.0')
    .addBearerAuth()
    // if you want to add different security requirements, add addBearerAuth and add ApiBearerAuth for each endpoint
    .addSecurityRequirements('bearer')
    .addServer(`http://localhost:${port}`, 'local')
    .build();
  const document = SwaggerModule.createDocument(app, config);
  SwaggerModule.setup('api', app, document);

  app.useGlobalPipes(
    new ValidationPipe({
      errorHttpStatusCode: 422,
      exceptionFactory: i18nValidationErrorFactory,
      transform: true,
    }),
  );
  app.useGlobalFilters(new HttpExceptionFilter());

  await app.listen(port);
}
bootstrap();
