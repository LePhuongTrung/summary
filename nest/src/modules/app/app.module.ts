import { Module } from '@nestjs/common';
import { ConfigModule } from '@nestjs/config';
import { EventEmitterModule } from '@nestjs/event-emitter';

import config from '@/common/configs';
import { AppController } from '@/modules/app/app.controller';

@Module({
  controllers: [AppController],
  imports: [
    ConfigModule.forRoot({
      envFilePath: `.env.${process.env.NODE_ENV}`,
      isGlobal: true,
      load: [config],
    }),
    EventEmitterModule.forRoot({
      global: true,
    }),
  ],
})
export class AppModule {}
